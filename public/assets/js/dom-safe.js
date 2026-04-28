(function () {
    'use strict';

    function text(value) {
        if (value === null || value === undefined) return '';
        return String(value);
    }

    function safeUrl(value, fallback) {
        var raw = text(value).trim();
        if (!raw) return fallback || '#';

        var lowered = raw.toLowerCase();
        if (lowered.startsWith('javascript:')) return fallback || '#';

        // Allow relative paths and common web protocols.
        if (
            raw.startsWith('./') ||
            raw.startsWith('../') ||
            raw.startsWith('/') ||
            lowered.startsWith('http://') ||
            lowered.startsWith('https://') ||
            lowered.startsWith('data:image/')
        ) {
            return raw;
        }

        return fallback || '#';
    }

    function el(tag, options) {
        var opts = options || {};
        var node = document.createElement(tag);

        if (opts.className) node.className = opts.className;
        if (opts.text !== undefined) node.textContent = text(opts.text);

        if (opts.attrs) {
            Object.keys(opts.attrs).forEach(function (key) {
                var val = opts.attrs[key];
                if (val === undefined || val === null) return;
                if (key === 'href' || key === 'src') {
                    node.setAttribute(key, safeUrl(val, key === 'src' ? '' : '#'));
                } else {
                    node.setAttribute(key, text(val));
                }
            });
        }

        if (opts.dataset) {
            Object.keys(opts.dataset).forEach(function (key) {
                var val = opts.dataset[key];
                if (val === undefined || val === null) return;
                node.dataset[key] = text(val);
            });
        }

        if (Array.isArray(opts.children)) {
            opts.children.forEach(function (child) {
                if (child) node.appendChild(child);
            });
        }

        return node;
    }

    function clearAndAppend(container, nodes) {
        if (!container) return;
        container.replaceChildren();
        (nodes || []).forEach(function (node) {
            if (node) container.appendChild(node);
        });
    }

    window.ATSDomSafe = {
        text: text,
        safeUrl: safeUrl,
        el: el,
        clearAndAppend: clearAndAppend
    };
})();

