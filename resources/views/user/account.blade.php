@extends('layouts.app')

@section('title', 'Account - ATS')

@section('content')
    <main class="max-w-[960px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3">
                <div>
                    <h1 class="text-[30px] md:text-[40px] font-bold mb-2">{{ $contentBlocks['account_title']->content ?? 'My Account' }}</h1>
                    <p class="text-gray-body text-[15px]">{{ $contentBlocks['account_desc']->content ?? 'Manage your profile, addresses, and preferences.' }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button id="account-logout-btn" type="submit" class="h-[38px] px-4 rounded-md border border-gray-border text-[13px] font-semibold hover:bg-gray-50 transition-colors">{{ $contentBlocks['account_logout']->content ?? 'Log Out' }}</button>
                </form>
            </div>
        </header>

        <section class="mb-6 border border-gray-border rounded-xl bg-white p-5">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-3 mb-4">
                <h2 class="text-[18px] font-bold">{{ $contentBlocks['account_orders_title']->content ?? 'My Orders' }}</h2>
                <div class="flex gap-2">
                    <a href="{{ route('orders') }}" class="h-[36px] px-4 inline-flex items-center rounded-md border border-gray-border text-[13px] font-semibold hover:bg-gray-50 transition-colors">{{ $contentBlocks['account_view_all_orders']->content ?? 'View All Orders' }}</a>
                    <a href="{{ route('tracking') }}" class="h-[36px] px-4 inline-flex items-center rounded-md bg-primary text-white text-[13px] font-semibold hover:bg-[#C4182A] transition-colors">{{ $contentBlocks['account_track_order']->content ?? 'Track Order' }}</a>
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
            <button type="button" class="h-[42px] rounded-lg text-[14px] font-semibold bg-white border border-gray-border" onclick="switchTab('profile')">{{ $contentBlocks['account_tab_profile']->content ?? 'Profile' }}</button>
            <button type="button" class="h-[42px] rounded-lg text-[14px] font-semibold hover:bg-white/70" onclick="switchTab('addresses')">{{ $contentBlocks['account_tab_addresses']->content ?? 'Addresses' }}</button>
            <button type="button" class="h-[42px] rounded-lg text-[14px] font-semibold hover:bg-white/70" onclick="switchTab('preferences')">{{ $contentBlocks['account_tab_preferences']->content ?? 'Preferences' }}</button>
        </section>

        <section class="border border-gray-border rounded-xl bg-white p-5 md:p-6">
            <form action="#" method="POST" id="account-form">
                @csrf
                <!-- Profile Panel -->
                <div id="panel-profile" class="tab-panel">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[13px] font-semibold mb-1">Full Name</label>
                            <input type="text" name="name" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="{{ auth()->user()->name ?? '' }}" placeholder="Enter full name">
                        </div>
                        <div>
                            <label class="block text-[13px] font-semibold mb-1">Email</label>
                            <input type="email" name="email" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="{{ auth()->user()->email ?? '' }}" placeholder="Enter email address">
                        </div>
                        <div>
                            <label class="block text-[13px] font-semibold mb-1">Phone</label>
                            <input type="tel" name="phone" class="w-full h-[40px] border border-gray-border rounded-md px-3" value="{{ auth()->user()->phone ?? '' }}" placeholder="Enter phone number">
                        </div>
                    </div>
                </div>

                <!-- Addresses Panel -->
                <div id="panel-addresses" class="tab-panel hidden">
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-[13px] font-semibold mb-1">Company</label>
                            <input type="text" name="company" class="w-full h-[40px] border border-gray-border rounded-md px-3" placeholder="Enter company name">
                        </div>
                        <div>
                            <label class="block text-[13px] font-semibold mb-1">City</label>
                            <input type="text" name="city" class="w-full h-[40px] border border-gray-border rounded-md px-3" placeholder="Enter city">
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-[13px] font-semibold mb-1">Address Line</label>
                            <input type="text" name="address" class="w-full h-[40px] border border-gray-border rounded-md px-3" placeholder="Enter full address">
                        </div>
                    </div>
                </div>

                <!-- Preferences Panel -->
                <div id="panel-preferences" class="tab-panel hidden">
                    <div class="space-y-4">
                        <label class="flex items-center gap-2 text-[14px]">
                            <input type="checkbox" name="newsletter" value="1"> Receive newsletter updates
                        </label>
                        <label class="flex items-center gap-2 text-[14px]">
                            <input type="checkbox" name="sms_alerts" value="1"> Receive SMS delivery alerts
                        </label>
                        <div>
                            <label class="block text-[13px] font-semibold mb-1">Preferred language</label>
                            <select name="language" class="h-[40px] border border-gray-border rounded-md px-3 bg-white">
                                <option value="en">English</option>
                                <option value="ar">Arabic</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div id="account-save-row" class="mt-6 pt-4 border-t border-gray-border flex justify-end">
                    <button id="account-save-btn" type="submit" class="h-[42px] px-6 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">{{ $contentBlocks['account_save_btn']->content ?? 'Save Changes' }}</button>
                </div>
            </form>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-panel').forEach(panel => {
            panel.classList.add('hidden');
        });
        document.getElementById('panel-' + tabId).classList.remove('hidden');

        let buttons = document.querySelectorAll('#account-tabs button');
        buttons.forEach(btn => {
            btn.className = 'h-[42px] rounded-lg text-[14px] font-semibold hover:bg-white/70';
        });
        
        event.currentTarget.className = 'h-[42px] rounded-lg text-[14px] font-semibold bg-white border border-gray-border';
    }
</script>
@endpush
