@extends('layouts.app')

@section('title', 'ATS - Shopping Cart')

@section('content')
    <main class="max-w-[1280px] w-full mx-auto px-6 md:px-10 py-10 lg:py-16 flex-1">
        <div class="flex justify-between items-end pb-6 border-b border-gray-border mb-8">
            <h1 class="font-space font-bold text-[32px] tracking-tight text-dark">Your Cart</h1>
            <a href="{{ route('catalog') }}" class="text-[14px] text-gray-body hover:text-dark transition-colors mb-1.5 flex items-center gap-1.5">
                <span>&larr;</span> Continue Shopping
            </a>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Left Column: Cart Items -->
            <div class="flex-1">
                <!-- Table Header -->
                <div class="hidden md:grid grid-cols-[3fr_1fr_1.5fr_1fr_auto] gap-4 mb-4 px-4 text-[12px] font-bold text-gray-body uppercase tracking-wider">
                    <div>Product</div>
                    <div class="text-center">Price</div>
                    <div class="text-center">Quantity</div>
                    <div class="text-right">Total</div>
                    <div class="w-8"></div>
                </div>

                <!-- Items Container -->
                <div id="full-cart-items" class="bg-white border text-dark border-gray-border rounded-[16px] shadow-sm overflow-hidden">
                    <!-- Items dynamic rendering via main.js -->
                </div>
            </div>

            <!-- Right Column: Cart Summary -->
            <div class="w-full lg:max-w-[380px] lg:w-[36%] shrink-0">
                <div class="bg-white border border-gray-border rounded-[16px] shadow-sm lg:sticky lg:top-[80px] xl:top-[100px]">
                    <div class="p-6 border-b border-gray-border">
                        <h2 class="font-space font-bold text-[20px] text-dark">Order Summary</h2>
                    </div>

                    <div class="p-6 pb-2">
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="text-gray-body">Subtotal</span>
                                <span id="cart-subtotal" class="font-medium text-dark font-bold text-[16px]">EGP 18,250.00</span>
                            </div>
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="text-gray-body">Shipping</span>
                                <span class="text-gray-body italic">Calculated at checkout</span>
                            </div>
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="text-gray-body">Tax (VAT 14%)</span>
                                <span class="text-gray-body italic">Calculated at checkout</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-border pt-5 pb-6">
                            <div class="flex justify-between items-end mb-1">
                                <span class="font-bold text-[18px] text-dark">Estimated Total</span>
                                <span id="cart-total" class="font-space text-[24px] text-primary tracking-tight font-bold">EGP 18,250.00</span>
                            </div>
                            <p class="text-[12px] text-gray-body text-right">Excludes tax & shipping</p>
                        </div>

                        <a href="{{ route('checkout') }}" class="w-full h-[56px] flex items-center justify-center text-[15px] bg-primary hover:bg-red-700 text-white font-medium rounded-[6px] transition-colors shadow-sm mb-4">
                            Proceed to Checkout
                        </a>
                        
                        <div class="flex items-center justify-center gap-2 mb-2 text-green-600">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
                                <polyline points="9 12 11 14 15.5 9.5"></polyline>
                            </svg>
                            <span class="text-[12px] text-gray-body">Secure Checkout guaranteed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
