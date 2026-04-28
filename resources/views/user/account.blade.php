@extends('layouts.app')

@section('title', 'Account - ATS')

@section('content')
    <main class="max-w-[960px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div>
                    <h1 class="text-[30px] md:text-[40px] font-bold mb-2">My Account</h1>
                    <p class="text-gray-body text-[15px]">Manage your profile, addresses, and preferences.</p>
                </div>
                <button id="account-logout-btn" type="button" class="h-[38px] px-4 rounded-md border border-gray-border text-[13px] font-semibold hover:bg-gray-50 transition-colors">Log Out</button>
            </div>
        </header>

        <section class="mb-6 border border-gray-border rounded-xl bg-white p-5">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
                <h2 class="text-[18px] font-bold">My Orders</h2>
                <div class="flex gap-2">
                    <a href="{{ route('orders') }}" class="h-[36px] px-4 inline-flex items-center rounded-md border border-gray-border text-[13px] font-semibold hover:bg-gray-50 transition-colors">View All Orders</a>
                    <a href="{{ route('tracking') }}" class="h-[36px] px-4 inline-flex items-center rounded-md bg-primary text-white text-[13px] font-semibold hover:bg-[#C4182A] transition-colors">Track Order</a>
                </div>
            </div>
            <div class="grid sm:grid-cols-2 gap-3 text-[13px]">
                <a href="{{ route('order-detail') }}?order=ATS-2026-10001" class="border border-gray-border rounded-lg p-3 hover:bg-gray-light transition-colors">
                    <p class="font-semibold">ATS-2026-10001</p>
                    <p class="text-gray-body">Click to open order details</p>
                </a>
                <a href="{{ route('order-detail') }}?order=ATS-2026-09974" class="border border-gray-border rounded-lg p-3 hover:bg-gray-light transition-colors">
                    <p class="font-semibold">ATS-2026-09974</p>
                    <p class="text-gray-body">Click to open order details</p>
                </a>
            </div>
        </section>

        <section id="account-tabs" class="mb-6 border border-gray-border rounded-xl bg-gray-light p-2 grid sm:grid-cols-3 gap-2">
            <button id="account-tab-profile" type="button" class="h-[42px] rounded-lg text-[14px] font-semibold bg-white border border-gray-border">Profile</button>
            <button id="account-tab-addresses" type="button" class="h-[42px] rounded-lg text-[14px] font-semibold">Addresses</button>
            <button id="account-tab-preferences" type="button" class="h-[42px] rounded-lg text-[14px] font-semibold">Preferences</button>
        </section>

        <section class="border border-gray-border rounded-xl bg-white p-5 md:p-6">
            <div id="account-panel"></div>
            <div id="account-save-row" class="mt-6 pt-4 border-t border-gray-border flex justify-end">
                <button id="account-save-btn" type="button" class="h-[42px] px-6 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Save Changes</button>
            </div>
            <p id="account-save-feedback" class="text-[13px] text-gray-body mt-3"></p>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/auth-service.js') }}"></script>
    <script>
    (function () {
        var auth = window.ATSAuthService;
        var STORAGE_KEY = 'ats_account_mock_state';
        var activeTab = 'profile';

        var tabProfile = document.getElementById('account-tab-profile');
        var tabAddresses = document.getElementById('account-tab-addresses');
        var tabPreferences = document.getElementById('account-tab-preferences');
        var panelEl = document.getElementById('account-panel');
        var saveBtn = document.getElementById('account-save-btn');
        var feedbackEl = document.getElementById('account-save-feedback');
        var logoutBtn = document.getElementById('account-logout-btn');
        var tabsEl = document.getElementById('account-tabs');
        var saveRowEl = document.getElementById('account-save-row');

        function requireSession() {
            if (auth && auth.requireSession()) return true;
            tabsEl.classList.add('hidden');
            saveRowEl.classList.add('hidden');
            panelEl.innerHTML = [
                '<div class="border border-dashed border-gray-border rounded-lg p-6 text-center">',
                '<h2 class="text-[20px] font-bold mb-2">Login Required</h2>',
                '<p class="text-gray-body mb-5">Please log in or create an account to manage your profile and orders.</p>',
                '<div class="flex justify-center gap-2">',
                '<a href="{{ route('login') }}" class="h-[38px] px-4 inline-flex items-center rounded-md bg-primary text-white text-[13px] font-semibold">Log In</a>',
                '<a href="{{ route('signup') }}" class="h-[38px] px-4 inline-flex items-center rounded-md border border-gray-border text-[13px] font-semibold">Create Account</a>',
                '</div>',
                '</div>'
            ].join('');
            return false;
        }

        function defaultState() {
            return {
                profile: {
                    fullName: 'Ahmed Hassan',
                    email: 'ahmed@example.com',
                    phone: '+20 100 000 0000'
                },
                addresses: {
                    company: 'TechCorp Egypt',
                    city: 'Alexandria',
                    addressLine: '28 Al-Horreya Road'
                },
                preferences: {
                    newsletter: true,
                    smsAlerts: false,
                    preferredLanguage: 'en'
                }
            };
        }

        function loadState() {
            try {
                var raw = localStorage.getItem(STORAGE_KEY);
                if (!raw) return defaultState();
                var parsed = JSON.parse(raw);
                return parsed && typeof parsed === 'object' ? parsed : defaultState();
            } catch (e) {
                return defaultState();
            }
        }

        var state = loadState();

        function saveState() {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(state));
        }

        function tabClasses(tabName) {
            return tabName === activeTab
                ? 'h-[42px] rounded-lg text-[14px] font-semibold bg-white border border-gray-border'
                : 'h-[42px] rounded-lg text-[14px] font-semibold hover:bg-white/70';
        }

        function renderTabs() {
            tabProfile.className = tabClasses('profile');
            tabAddresses.className = tabClasses('addresses');
            tabPreferences.className = tabClasses('preferences');
        }

        function profilePanel() {
            return [
                '<div class="grid md:grid-cols-2 gap-4">',
                '<div><label for="acc-full-name" class="block text-[13px] font-semibold mb-1">Full Name</label><input id="acc-full-name" type="text" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="' + state.profile.fullName + '"></div>',
                '<div><label for="acc-email" class="block text-[13px] font-semibold mb-1">Email</label><input id="acc-email" type="email" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="' + state.profile.email + '"></div>',
                '<div><label for="acc-phone" class="block text-[13px] font-semibold mb-1">Phone</label><input id="acc-phone" type="tel" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="' + state.profile.phone + '"></div>',
                '</div>'
            ].join('');
        }

        function addressesPanel() {
            return [
                '<div class="grid md:grid-cols-2 gap-4">',
                '<div><label for="acc-company" class="block text-[13px] font-semibold mb-1">Company</label><input id="acc-company" type="text" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="' + state.addresses.company + '"></div>',
                '<div><label for="acc-city" class="block text-[13px] font-semibold mb-1">City</label><input id="acc-city" type="text" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="' + state.addresses.city + '"></div>',
                '<div class="md:col-span-2"><label for="acc-address-line" class="block text-[13px] font-semibold mb-1">Address Line</label><input id="acc-address-line" type="text" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="' + state.addresses.addressLine + '"></div>',
                '</div>'
            ].join('');
        }

        function preferencesPanel() {
            return [
                '<div class="space-y-4">',
                '<label class="flex items-center gap-2 text-[14px]"><input id="acc-newsletter" type="checkbox" ' + (state.preferences.newsletter ? 'checked' : '') + '> Receive newsletter updates</label>',
                '<label class="flex items-center gap-2 text-[14px]"><input id="acc-sms" type="checkbox" ' + (state.preferences.smsAlerts ? 'checked' : '') + '> Receive SMS delivery alerts</label>',
                '<div><label for="acc-lang" class="block text-[13px] font-semibold mb-1">Preferred language</label>',
                '<select id="acc-lang" class="h-[40px] border border-gray-border rounded-md px-3 bg-white">',
                '<option value="en" ' + (state.preferences.preferredLanguage === 'en' ? 'selected' : '') + '>English</option>',
                '<option value="ar" ' + (state.preferences.preferredLanguage === 'ar' ? 'selected' : '') + '>Arabic</option>',
                '</select></div>',
                '</div>'
            ].join('');
        }

        function renderPanel() {
            if (activeTab === 'profile') panelEl.innerHTML = profilePanel();
            else if (activeTab === 'addresses') panelEl.innerHTML = addressesPanel();
            else panelEl.innerHTML = preferencesPanel();
        }

        function collectActiveTabValues() {
            if (activeTab === 'profile') {
                state.profile.fullName = document.getElementById('acc-full-name').value.trim();
                state.profile.email = document.getElementById('acc-email').value.trim();
                state.profile.phone = document.getElementById('acc-phone').value.trim();
            } else if (activeTab === 'addresses') {
                state.addresses.company = document.getElementById('acc-company').value.trim();
                state.addresses.city = document.getElementById('acc-city').value.trim();
                state.addresses.addressLine = document.getElementById('acc-address-line').value.trim();
            } else {
                state.preferences.newsletter = document.getElementById('acc-newsletter').checked;
                state.preferences.smsAlerts = document.getElementById('acc-sms').checked;
                state.preferences.preferredLanguage = document.getElementById('acc-lang').value;
            }
        }

        function setTab(next) {
            collectActiveTabValues();
            activeTab = next;
            feedbackEl.textContent = '';
            renderTabs();
            renderPanel();
        }

        tabProfile.addEventListener('click', function () { setTab('profile'); });
        tabAddresses.addEventListener('click', function () { setTab('addresses'); });
        tabPreferences.addEventListener('click', function () { setTab('preferences'); });

        saveBtn.addEventListener('click', function () {
            collectActiveTabValues();
            saveState();
            feedbackEl.textContent = 'Changes saved successfully.';
        });

        logoutBtn.addEventListener('click', function () {
            if (auth && auth.signOut) auth.signOut();
            window.location.href = '{{ route('login') }}';
        });

        if (!requireSession()) return;
        renderTabs();
        renderPanel();
    })();
    </script>
@endpush
