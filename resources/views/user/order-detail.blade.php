@extends('layouts.app')

@section('title', 'Order Details - ATS')

@section('content')
    <main class="max-w-[1100px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <section id="order-auth-required" class="hidden border border-dashed border-gray-border rounded-xl p-10 text-center mb-6">
            <h1 class="text-[28px] font-bold mb-3">Login Required</h1>
            <p class="text-gray-body mb-6">Please log in to view order details.</p>
            <div class="flex justify-center gap-2">
                <a href="{{ route('login') }}" class="inline-flex h-[42px] px-5 items-center rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Log In</a>
                <a href="{{ route('signup') }}" class="inline-flex h-[42px] px-5 items-center rounded-md border border-gray-border font-semibold hover:bg-gray-50 transition-colors">Create Account</a>
            </div>
        </section>

        <section id="order-not-found" class="hidden border border-dashed border-gray-border rounded-xl p-10 text-center">
            <h1 class="text-[28px] font-bold mb-3">Order Not Found</h1>
            <p class="text-gray-body mb-6">We could not find an order matching your request.</p>
            <a href="{{ route('orders') }}" class="inline-flex h-[42px] px-5 items-center rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Back to Orders</a>
        </section>

        <section id="order-detail-view" class="hidden">
            <header class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-3">
                <div>
                    <h1 class="text-[30px] md:text-[40px] font-bold mb-1">Order Details</h1>
                    <p class="text-gray-body text-[15px]">Review your order summary and shipment status.</p>
                </div>
                <a id="order-tracking-link" href="{{ route('tracking') }}" class="inline-flex h-[40px] px-4 items-center rounded-md bg-primary text-white text-[13px] font-semibold hover:bg-[#C4182A] transition-colors">Track Shipment</a>
            </header>

            <section class="grid md:grid-cols-3 gap-4 mb-6">
                <article class="border border-gray-border rounded-xl p-4 bg-white">
                    <p class="text-[12px] text-gray-body mb-1">Order Number</p>
                    <p id="order-number" class="font-bold text-[15px]"></p>
                </article>
                <article class="border border-gray-border rounded-xl p-4 bg-white">
                    <p class="text-[12px] text-gray-body mb-1">Order Date</p>
                    <p id="order-date" class="font-bold text-[15px]"></p>
                </article>
                <article class="border border-gray-border rounded-xl p-4 bg-white">
                    <p class="text-[12px] text-gray-body mb-1">Status</p>
                    <p id="order-status" class="font-bold text-[15px]"></p>
                </article>
            </section>

            <section class="grid lg:grid-cols-[1fr_320px] gap-6">
                <div class="border border-gray-border rounded-xl overflow-hidden bg-white">
                    <div class="bg-gray-light px-4 py-3 border-b border-gray-border">
                        <h2 class="font-semibold">Items</h2>
                    </div>
                    <div id="order-items" class="divide-y divide-gray-border"></div>
                </div>

                <aside class="border border-gray-border rounded-xl p-4 bg-white h-fit">
                    <h2 class="font-semibold mb-4">Totals</h2>
                    <div class="space-y-3 text-[14px]">
                        <div class="flex justify-between"><span class="text-gray-body">Subtotal</span><span id="order-subtotal" class="font-semibold"></span></div>
                        <div class="flex justify-between"><span class="text-gray-body">Tax</span><span id="order-tax" class="font-semibold"></span></div>
                        <div class="flex justify-between"><span class="text-gray-body">Shipping</span><span id="order-shipping" class="font-semibold"></span></div>
                        <div class="border-t border-gray-border pt-3 flex justify-between text-[16px]"><span class="font-bold">Total</span><span id="order-total" class="font-bold"></span></div>
                    </div>
                    <a href="{{ route('orders') }}" class="mt-5 inline-flex w-full h-[40px] items-center justify-center rounded-md border border-gray-border text-[13px] font-semibold hover:bg-gray-50 transition-colors">Back to Orders</a>
                </aside>
            </section>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/orders-service.js') }}"></script>
    <script src="{{ asset('assets/js/auth-service.js') }}"></script>
    <script>
    (function () {
        var auth = window.ATSAuthService;
        var ordersService = window.ATSOrdersService;

        var params = new URLSearchParams(window.location.search);
        var orderId = params.get('order') || '';
        var order = ordersService && ordersService.getOrderById ? ordersService.getOrderById(orderId) : null;

        var authRequiredEl = document.getElementById('order-auth-required');
        var notFoundEl = document.getElementById('order-not-found');
        var detailEl = document.getElementById('order-detail-view');

        @if(!auth()->check())
            authRequiredEl.classList.remove('hidden');
            return;
        @endif

        if (!order) {
            notFoundEl.classList.remove('hidden');
            return;
        }

        detailEl.classList.remove('hidden');

        document.getElementById('order-number').textContent = order.id;
        document.getElementById('order-date').textContent = new Date(order.dateISO + 'T00:00:00').toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        document.getElementById('order-status').textContent = ordersService && ordersService.statusLabel ? ordersService.statusLabel(order.status, 'en') : order.status;
        document.getElementById('order-subtotal').textContent = order.subtotal.toLocaleString('en-US') + ' EGP';
        document.getElementById('order-tax').textContent = order.tax.toLocaleString('en-US') + ' EGP';
        document.getElementById('order-shipping').textContent = order.shipping.toLocaleString('en-US') + ' EGP';
        document.getElementById('order-total').textContent = order.total.toLocaleString('en-US') + ' EGP';
        document.getElementById('order-tracking-link').href = '{{ route('tracking') }}?order=' + encodeURIComponent(order.id);

        var itemsHtml = order.items.map(function (item) {
            var linePrice = Number(item.lineTotal || 0);
            return [
                '<article class="p-4 flex items-start justify-between gap-3">',
                '<div>',
                '<p class="font-semibold text-[14px]">' + item.name + '</p>',
                '<p class="text-[12px] text-gray-body">Qty: ' + item.qty + '</p>',
                '</div>',
                '<p class="font-semibold text-[14px]">' + linePrice.toLocaleString('en-US') + ' EGP</p>',
                '</article>'
            ].join('');
        }).join('');

        document.getElementById('order-items').innerHTML = itemsHtml;
    })();
    </script>
@endpush
