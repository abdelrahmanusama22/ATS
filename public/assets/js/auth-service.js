(function () {
    'use strict';

    var KEYS = {
        legacyUsers: 'ats_auth_users',
        legacySession: 'ats_auth_session',
        users: 'ats_auth_v2_users',
        session: 'ats_auth_v2_session'
    };

    var SESSION_TTL_MS = 8 * 60 * 60 * 1000;

    function safeParse(raw, fallback) {
        try {
            var parsed = JSON.parse(raw || '');
            return parsed && typeof parsed === 'object' ? parsed : fallback;
        } catch (e) {
            return fallback;
        }
    }

    function toBase64(bytes) {
        var binary = '';
        for (var i = 0; i < bytes.length; i += 1) {
            binary += String.fromCharCode(bytes[i]);
        }
        return btoa(binary);
    }

    function fromBase64(base64) {
        var binary = atob(base64);
        var bytes = new Uint8Array(binary.length);
        for (var i = 0; i < binary.length; i += 1) {
            bytes[i] = binary.charCodeAt(i);
        }
        return bytes;
    }

    function randomBase64(length) {
        var bytes = new Uint8Array(length);
        window.crypto.getRandomValues(bytes);
        return toBase64(bytes);
    }

    function normalizeEmail(email) {
        return String(email || '').trim().toLowerCase();
    }

    function validateEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    function validateName(name) {
        return String(name || '').trim().length >= 2;
    }

    function validatePassword(password) {
        var val = String(password || '');
        if (val.length < 6) return false;
        var hasLetter = /[A-Za-z]/.test(val);
        var hasNumber = /[0-9]/.test(val);
        return hasLetter && hasNumber;
    }

    function getUsers() {
        var users = safeParse(localStorage.getItem(KEYS.users), []);
        return Array.isArray(users) ? users : [];
    }

    function saveUsers(users) {
        localStorage.setItem(KEYS.users, JSON.stringify(users));
    }

    async function hashPassword(password, saltBase64) {
        var enc = new TextEncoder();
        var saltBytes = fromBase64(saltBase64);
        var keyMaterial = await window.crypto.subtle.importKey(
            'raw',
            enc.encode(String(password || '')),
            { name: 'PBKDF2' },
            false,
            ['deriveBits']
        );
        var bits = await window.crypto.subtle.deriveBits(
            {
                name: 'PBKDF2',
                salt: saltBytes,
                iterations: 120000,
                hash: 'SHA-256'
            },
            keyMaterial,
            256
        );
        return toBase64(new Uint8Array(bits));
    }

    function writeSession(user) {
        var now = Date.now();
        var payload = {
            sessionId: 'ses_' + randomBase64(12).replace(/[^a-zA-Z0-9]/g, ''),
            userId: user.id,
            email: user.email,
            name: user.name,
            issuedAt: now,
            expiresAt: now + SESSION_TTL_MS,
            schema: 2
        };

        localStorage.setItem(KEYS.session, JSON.stringify(payload));
        // Keep legacy key while older pages still gate on it.
        localStorage.setItem(KEYS.legacySession, JSON.stringify({
            email: user.email,
            name: user.name,
            loggedInAt: now
        }));

        window.dispatchEvent(new CustomEvent('atsAuthSessionChanged', { detail: { active: true, email: user.email } }));
        return payload;
    }

    function getSession() {
        var session = safeParse(localStorage.getItem(KEYS.session), null);
        if (!session) return null;
        if (!session.expiresAt || Date.now() > session.expiresAt) {
            localStorage.removeItem(KEYS.session);
            localStorage.removeItem(KEYS.legacySession);
            return null;
        }
        return session;
    }

    async function migrateLegacyUserIfMatch(email, password) {
        var legacyUsers = safeParse(localStorage.getItem(KEYS.legacyUsers), []);
        if (!Array.isArray(legacyUsers) || !legacyUsers.length) return null;

        var found = legacyUsers.find(function (u) {
            return normalizeEmail(u.email) === email && String(u.password || '') === String(password || '');
        });

        if (!found) return null;

        var users = getUsers();
        var exists = users.find(function (u) { return normalizeEmail(u.email) === email; });
        if (exists) return exists;

        var salt = randomBase64(16);
        var passHash = await hashPassword(password, salt);
        var migrated = {
            id: 'usr_' + randomBase64(12).replace(/[^a-zA-Z0-9]/g, ''),
            name: String(found.name || 'User').trim() || 'User',
            email: email,
            passwordHash: passHash,
            salt: salt,
            createdAt: Number(found.createdAt || Date.now()),
            updatedAt: Date.now()
        };
        users.push(migrated);
        saveUsers(users);
        return migrated;
    }

    var AuthService = {
        async signUp(payload) {
            var name = String((payload && payload.name) || '').trim();
            var email = normalizeEmail((payload && payload.email) || '');
            var password = String((payload && payload.password) || '');

            if (!validateName(name)) return { ok: false, code: 'NAME_REQUIRED' };
            if (!validateEmail(email)) return { ok: false, code: 'INVALID_EMAIL' };
            if (!validatePassword(password)) return { ok: false, code: 'WEAK_PASSWORD' };

            var users = getUsers();
            var exists = users.some(function (u) { return normalizeEmail(u.email) === email; });
            if (exists) return { ok: false, code: 'EMAIL_EXISTS' };

            var salt = randomBase64(16);
            var passHash = await hashPassword(password, salt);
            var now = Date.now();
            var user = {
                id: 'usr_' + randomBase64(12).replace(/[^a-zA-Z0-9]/g, ''),
                name: name,
                email: email,
                passwordHash: passHash,
                salt: salt,
                createdAt: now,
                updatedAt: now
            };

            users.push(user);
            saveUsers(users);
            writeSession(user);

            return { ok: true, user: { id: user.id, email: user.email, name: user.name } };
        },

        async signIn(payload) {
            var email = normalizeEmail((payload && payload.email) || '');
            var password = String((payload && payload.password) || '');

            if (!validateEmail(email)) return { ok: false, code: 'INVALID_EMAIL' };
            if (!password) return { ok: false, code: 'INVALID_CREDENTIALS' };

            var users = getUsers();
            var user = users.find(function (u) { return normalizeEmail(u.email) === email; });

            if (!user) {
                user = await migrateLegacyUserIfMatch(email, password);
            }

            if (!user) return { ok: false, code: 'INVALID_CREDENTIALS' };

            var computed = await hashPassword(password, user.salt);
            if (computed !== user.passwordHash) return { ok: false, code: 'INVALID_CREDENTIALS' };

            writeSession(user);
            return { ok: true, user: { id: user.id, email: user.email, name: user.name } };
        },

        signOut: function () {
            localStorage.removeItem(KEYS.session);
            localStorage.removeItem(KEYS.legacySession);
            window.dispatchEvent(new CustomEvent('atsAuthSessionChanged', { detail: { active: false } }));
        },

        getSession: getSession,

        requireSession: function () {
            return !!getSession();
        }
    };

    window.ATSAuthService = AuthService;
})();

