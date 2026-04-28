@extends('layouts.app')

@section('title', 'Order Tracking - ATS')

@section('content')
    <main class="max-w-[980px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <h1 class="text-[30px] md:text-[40px] font-bold mb-2">Track Your Order</h1>
            <p class="text-gray-body text-[15px]">Enter your order number to view shipping progress.</p>
        </header>

        <section id="tracking-auth-required" class="hidden border border-dashed border-gray-border rounded-xl p-8 text-center mb-6">
            <h2 class="text-[22px] font-bold mb-2">Login Required</h2>
            <p class="text-gray-body mb-5">Please log in to track shipments.</p>
            <div class="flex justify-center gap-2">
                <a href="{{ url('login') }}" class="h-[38px] px-4 inline-flex items-center rounded-md bg-primary text-white text-[13px] font-semibold">Log In</a>
                <a href="{{ url('signup') }}" class="h-[38px] px-4 inline-flex items-center rounded-md border border-gray-border text-[13px] font-semibold">Create Account</a>
            </div>
        </section>

        <section id="tracking-controls" class="mb-8 bg-gray-light border border-gray-border rounded-xl p-4 md:p-5">
            <div class="flex flex-col sm:flex-row gap-3">
                <label for="tracking-input" class="sr-only">Order number</label>
                <input id="tracking-input" type="text" placeholder="ATS-2026-10001" class="h-[44px] w-full rounded-md border border-gray-border px-4 outline-none focus:border-primary">
                <button id="tracking-submit-btn" type="button" class="h-[44px] px-6 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">
                    Track
                </button>
            </div>
        </section>

        <section id="tracking-not-found" class="hidden border border-dashed border-gray-border rounded-xl p-8 text-center mb-6">
            <h2 class="text-[22px] font-bold mb-2">Tracking Not Found</h2>
            <p class="text-gray-body mb-5">No shipment data was found for this order number.</p>
            <a href="{{ url('orders') }}" class="inline-flex h-[40px] px-4 items-center rounded-md border border-gray-border font-semibold hover:bg-gray-50 transition-colors">Back to Orders</a>
        </section>

        <section id="tracking-view" class="hidden">
            <div class="border border-gray-border rounded-xl p-5 bg-white mb-6">
                <p class="text-[12px] text-gray-body mb-1">Current Status</p>
                <p id="tracking-current-status" class="text-[20px] font-bold" aria-live="polite"></p>
                <p id="tracking-eta" class="text-[14px] text-gray-body mt-2"></p>
            </div>

            <div id="tracking-timeline" class="border border-gray-border rounded-xl bg-white p-5 space-y-4"></div>
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

        var inputEl = document.getElementById('tracking-input');
        var submitEl = document.getElementById('tracking-submit-btn');
        var viewEl = document.getElementById('tracking-view');
        var notFoundEl = document.getElementById('tracking-not-found');
        var authRequiredEl = document.getElementById('tracking-auth-required');
        var controlsEl = document.getElementById('tracking-controls');
        var statusEl = document.getElementById('tracking-current-status');
        var etaEl = document.getElementById('tracking-eta');
        var timelineEl = document.getElementById('tracking-timeline');

        @if(!auth()->check())
            authRequiredEl.classList.remove('hidden');
            controlsEl.classList.add('hidden');
            viewEl.classList.add('hidden');
            notFoundEl.classList.add('hidden');
            return;
        @endif

        function stepTitle(stepKey) {
            if (stepKey === 'placed') return 'Order Placed';
            if (stepKey === 'processed') return 'Packed at Warehouse';
            if (stepKey === 'transit') return 'In Transit';
            if (stepKey === 'delivered') return 'Delivered';
            return 'Update';
        }

        function renderTimeline(steps) {
            timelineEl.innerHTML = steps.map(function (step) {
                var dotClass = step.done ? 'bg-primary border-primary' : 'bg-white border-gray-border';
                var textClass = step.done ? 'text-dark' : 'text-gray-body';
                return [
                    '<div class="flex items-start gap-3">',
                    '<span class="mt-1 w-4 h-4 rounded-full border-2 ' + dotClass + '"></span>',
                    '<div>',
                    '<p class="font-semibold text-[14px] ' + textClass + '">' + stepTitle(step.key) + '</p>',
                    '<p class="text-[12px] text-gray-body">' + (step.done ? 'Completed' : 'Pending') + '</p>',
                    '</div>',
                    '</div>'
                ].join('');
            }).join('');
        }

        function showOrder(orderId) {
            var normalized = (orderId || '').trim().toUpperCase();
            if (!normalized) {
                viewEl.classList.add('hidden');
                notFoundEl.classList.add('hidden');
                return;
            }

            var order = ordersService && ordersService.getOrderById ? ordersService.getOrderById(normalized) : null;
            if (!order) {
                viewEl.classList.add('hidden');
                notFoundEl.classList.remove('hidden');
                return;
            }

            var data = ordersService && ordersService.trackingSummary ? ordersService.trackingSummary(order, 'en') : null;
            if (!data) {
                viewEl.classList.add('hidden');
                notFoundEl.classList.remove('hidden');
                return;
            }

            notFoundEl.classList.add('hidden');
            viewEl.classList.remove('hidden');
            statusEl.textContent = data.status;
            etaEl.textContent = data.eta;
            renderTimeline(data.steps);
        }

        function updateQuery(orderId) {
            var url = new URL(window.location.href);
            if (orderId) {
                url.searchParams.set('order', orderId.toUpperCase());
            } else {
                url.searchParams.delete('order');
            }
            window.history.replaceState({}, '', url.toString());
        }

        submitEl.addEventListener('click', function () {
            var orderId = inputEl.value.trim();
            updateQuery(orderId);
            showOrder(orderId);
        });

        inputEl.addEventListener('keydown', function (event) {
            if (event.key === 'Enter') {
                event.preventDefault();
                submitEl.click();
            }
        });

        var params = new URLSearchParams(window.location.search);
        var queryOrder = params.get('order') || '';
        if (queryOrder) inputEl.value = queryOrder;
        showOrder(queryOrder);
    })();
    </script>
@endpush
