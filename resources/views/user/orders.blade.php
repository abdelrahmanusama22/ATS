@extends('layouts.app')

@section('title', 'Orders - ATS')

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <h1 class="text-[30px] md:text-[40px] font-bold mb-2">My Orders</h1>
            <p id="orders-count" class="text-gray-body text-[15px]" aria-live="polite">0 orders</p>
        </header>

        <section id="orders-auth-required" class="hidden border border-dashed border-gray-border rounded-xl p-8 text-center mb-6">
            <h2 class="text-[22px] font-bold mb-2">Login Required</h2>
            <p class="text-gray-body mb-5">Please log in to access your order history.</p>
            <div class="flex justify-center gap-2">
                <a href="{{ route('login') }}" class="h-[38px] px-4 inline-flex items-center rounded-md bg-primary text-white text-[13px] font-semibold">Log In</a>
                <a href="{{ route('signup') }}" class="h-[38px] px-4 inline-flex items-center rounded-md border border-gray-border text-[13px] font-semibold">Create Account</a>
            </div>
        </section>

        <section id="orders-filters" class="mb-8 bg-gray-light border border-gray-border rounded-xl p-4 md:p-5">
            <div class="grid md:grid-cols-3 gap-3">
                <div>
                    <label for="orders-search-input" class="sr-only">Search orders</label>
                    <input id="orders-search-input" type="search" placeholder="Search by order number" class="h-[42px] w-full rounded-md border border-gray-border px-3 outline-none focus:border-primary">
                </div>
                <div>
                    <label for="orders-filter-status" class="sr-only">Filter by status</label>
                    <select id="orders-filter-status" class="h-[42px] w-full rounded-md border border-gray-border px-3 bg-white text-[14px]">
                        <option value="all">All Statuses</option>
                        <option value="pending">Pending</option>
                        <option value="processing">Processing</option>
                        <option value="shipped">Shipped</option>
                        <option value="delivered">Delivered</option>
                        <option value="cancelled">Cancelled</option>
                    </select>
                </div>
                <div>
                    <label for="orders-filter-date" class="sr-only">Filter by date</label>
                    <select id="orders-filter-date" class="h-[42px] w-full rounded-md border border-gray-border px-3 bg-white text-[14px]">
                        <option value="all">Any Time</option>
                        <option value="30">Last 30 days</option>
                        <option value="90">Last 90 days</option>
                        <option value="365">Last 12 months</option>
                    </select>
                </div>
            </div>
        </section>

        <div id="orders-empty" class="hidden border border-dashed border-gray-border rounded-xl p-10 text-center text-gray-body mb-6">
            No matching orders found.
        </div>

        <div id="orders-list"></div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/orders-service.js') }}"></script>
    <script src="{{ asset('assets/js/auth-service.js') }}"></script>
    <script>
    (function () {
        var auth = window.ATSAuthService;
        var ordersService = window.ATSOrdersService;
        var orders = ordersService && ordersService.getOrders ? ordersService.getOrders() : [];

        var countEl = document.getElementById('orders-count');
        var listEl = document.getElementById('orders-list');
        var emptyEl = document.getElementById('orders-empty');
        var statusEl = document.getElementById('orders-filter-status');
        var dateEl = document.getElementById('orders-filter-date');
        var searchEl = document.getElementById('orders-search-input');
        var authRequiredEl = document.getElementById('orders-auth-required');
        var filtersEl = document.getElementById('orders-filters');

        if (!(auth && auth.requireSession && auth.requireSession())) {
            authRequiredEl.classList.remove('hidden');
            filtersEl.classList.add('hidden');
            listEl.classList.add('hidden');
            emptyEl.classList.add('hidden');
            countEl.textContent = 'Login required';
            return;
        }

        function mapStatus(status) {
            var label = ordersService && ordersService.statusLabel ? ordersService.statusLabel(status, 'en') : (status.charAt(0).toUpperCase() + status.slice(1));
            var cls = 'bg-gray-100 text-gray-700';
            if (status === 'delivered') cls = 'bg-green-100 text-green-700';
            else if (status === 'shipped') cls = 'bg-blue-100 text-blue-700';
            else if (status === 'processing') cls = 'bg-amber-100 text-amber-700';
            else if (status === 'pending') cls = 'bg-orange-100 text-orange-700';
            else if (status === 'cancelled') cls = 'bg-red-100 text-red-700';
            return { label: label, cls: cls };
        }

        function formatDate(iso) {
            var d = new Date(String(iso) + 'T00:00:00');
            return d.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        }

        function daysAgo(iso) {
            var now = new Date();
            var d = new Date(iso + 'T00:00:00');
            return Math.floor((now - d) / (1000 * 60 * 60 * 24));
        }

        function filtered() {
            var q = searchEl.value.trim().toLowerCase();
            var status = statusEl.value;
            var days = dateEl.value === 'all' ? null : Number(dateEl.value);

            return orders.filter(function (o) {
                var qOk = q ? String(o.id).toLowerCase().indexOf(q) !== -1 : true;
                var sOk = status === 'all' ? true : String(o.status) === status;
                var dOk = days == null ? true : daysAgo(o.dateISO) <= days;
                return qOk && sOk && dOk;
            });
        }

        function desktopTable(rows) {
            var body = rows.map(function (o) {
                var s = mapStatus(o.status);
                return [
                    '<tr class="border-b border-gray-border last:border-b-0">',
                    '<td class="py-4 px-4 font-semibold">' + o.id + '</td>',
                    '<td class="py-4 px-4">' + formatDate(o.dateISO) + '</td>',
                    '<td class="py-4 px-4"><span class="px-2.5 py-1 rounded-full text-[12px] font-semibold ' + s.cls + '">' + s.label + '</span></td>',
                    '<td class="py-4 px-4">' + o.itemCount + ' items</td>',
                    '<td class="py-4 px-4 font-semibold">' + Number(o.total || 0).toLocaleString('en-US') + ' EGP</td>',
                    '<td class="py-4 px-4">',
                    '<div class="flex gap-2">',
                    '<a href="{{ route('order-detail') }}?order=' + encodeURIComponent(o.id) + '" class="h-[34px] px-3 inline-flex items-center rounded-md border border-gray-border text-[12px] font-semibold hover:bg-gray-50">Details</a>',
                    '<a href="{{ route('tracking') }}?order=' + encodeURIComponent(o.id) + '" class="h-[34px] px-3 inline-flex items-center rounded-md bg-primary text-white text-[12px] font-semibold hover:bg-[#C4182A]">Track</a>',
                    '</div>',
                    '</td>',
                    '</tr>'
                ].join('');
            }).join('');

            return [
                '<div class="hidden md:block border border-gray-border rounded-xl overflow-hidden">',
                '<table class="w-full text-left text-[14px]">',
                '<thead class="bg-gray-light">',
                '<tr>',
                '<th class="py-3 px-4 font-semibold">Order</th>',
                '<th class="py-3 px-4 font-semibold">Date</th>',
                '<th class="py-3 px-4 font-semibold">Status</th>',
                '<th class="py-3 px-4 font-semibold">Items</th>',
                '<th class="py-3 px-4 font-semibold">Total</th>',
                '<th class="py-3 px-4 font-semibold">Actions</th>',
                '</tr>',
                '</thead>',
                '<tbody>' + body + '</tbody>',
                '</table>',
                '</div>'
            ].join('');
        }

        function mobileCards(rows) {
            var cards = rows.map(function (o) {
                var s = mapStatus(o.status);
                return [
                    '<article class="md:hidden border border-gray-border rounded-xl p-4 bg-white">',
                    '<div class="flex items-start justify-between gap-2 mb-2">',
                    '<h3 class="font-semibold text-[14px]">' + o.id + '</h3>',
                    '<span class="px-2.5 py-1 rounded-full text-[11px] font-semibold ' + s.cls + '">' + s.label + '</span>',
                    '</div>',
                    '<p class="text-[13px] text-gray-body mb-1">Date: ' + formatDate(o.dateISO) + '</p>',
                    '<p class="text-[13px] text-gray-body mb-1">Items: ' + o.itemCount + '</p>',
                    '<p class="text-[14px] font-semibold mb-3">Total: ' + Number(o.total || 0).toLocaleString('en-US') + ' EGP</p>',
                    '<div class="flex gap-2">',
                    '<a href="{{ route('order-detail') }}?order=' + encodeURIComponent(o.id) + '" class="flex-1 h-[34px] inline-flex items-center justify-center rounded-md border border-gray-border text-[12px] font-semibold">Details</a>',
                    '<a href="{{ route('tracking') }}?order=' + encodeURIComponent(o.id) + '" class="flex-1 h-[34px] inline-flex items-center justify-center rounded-md bg-primary text-white text-[12px] font-semibold">Track</a>',
                    '</div>',
                    '</article>'
                ].join('');
            }).join('');

            return '<div class="grid gap-3">' + cards + '</div>';
        }

        function render() {
            var rows = filtered();
            countEl.textContent = rows.length + (rows.length === 1 ? ' order' : ' orders');
            emptyEl.classList.toggle('hidden', rows.length > 0);
            listEl.innerHTML = rows.length ? (desktopTable(rows) + mobileCards(rows)) : '';
        }

        statusEl.addEventListener('change', render);
        dateEl.addEventListener('change', render);
        searchEl.addEventListener('input', render);

        render();
    })();
    </script>
@endpush
