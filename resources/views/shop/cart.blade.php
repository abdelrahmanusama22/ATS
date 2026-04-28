@extends('layouts.app')

@section('title', 'ATS - Shopping Cart')

@section('content')
    <main class="max-w-[1280px] w-full mx-auto px-6 md:px-10 py-10 lg:py-16 flex-1">
        <div class="flex justify-between items-end pb-6 border-b border-gray-border mb-8">
            <h1 class="font-space font-bold text-[32px] tracking-tight text-dark">{{ $contentBlocks['cart_title']->content ?? 'Your Cart' }}</h1>
            <a href="{{ route('catalog') }}" class="text-[14px] text-gray-body hover:text-dark transition-colors mb-1.5 flex items-center gap-1.5">
                <span>&larr;</span> {{ $contentBlocks['catalog_breadcrumbs_current']->content ?? 'Continue Shopping' }}
            </a>
        </div>

        <div class="flex flex-col lg:flex-row gap-10">
            <!-- Left Column: Cart Items -->
            <div class="flex-1">
                <!-- Table Header -->
                <div class="hidden md:grid grid-cols-[3fr_1fr_1.5fr_1fr_auto] gap-4 mb-4 px-4 text-[12px] font-bold text-gray-body uppercase tracking-wider">
                    <div>{{ $contentBlocks['header_products']->content ?? 'Product' }}</div>
                    <div class="text-center">{{ $contentBlocks['product_price_lbl']->content ?? 'Price' }}</div>
                    <div class="text-center">{{ $contentBlocks['product_qty_lbl']->content ?? 'Quantity' }}</div>
                    <div class="text-right">{{ $contentBlocks['cart_total']->content ?? 'Total' }}</div>
                    <div class="w-8"></div>
                </div>

                <!-- Items Container -->
                <div class="bg-white border text-dark border-gray-border rounded-[16px] shadow-sm overflow-hidden">
                    @if(isset($cartItems) && count($cartItems) > 0)
                        @foreach($cartItems as $item)
                        <div class="grid md:grid-cols-[3fr_1fr_1.5fr_1fr_auto] gap-4 items-center p-4 border-b border-gray-border last:border-0">
                            <div class="flex items-center gap-4">
                                <img src="{{ $item->product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $item->product->title }}" class="w-16 h-16 object-cover rounded">
                                <div>
                                    <h3 class="font-bold text-[14px] text-dark">{{ $item->product->title }}</h3>
                                </div>
                            </div>
                            <div class="text-center font-medium">{{ number_format($item->price) }} {{ $contentBlocks['product_currency']->content ?? 'EGP' }}</div>
                            <div class="flex justify-center">
                                <div class="flex items-center border border-gray-border rounded bg-white h-10 w-[100px]">
                                    <button type="button" class="w-8 h-full flex items-center justify-center text-gray-body hover:text-primary transition-colors border-r border-gray-border">-</button>
                                    <input type="text" value="{{ $item->quantity }}" class="flex-1 h-full w-[30px] text-center outline-none font-medium text-[14px] bg-transparent text-dark" readonly>
                                    <button type="button" class="w-8 h-full flex items-center justify-center text-gray-body hover:text-primary transition-colors border-l border-gray-border">+</button>
                                </div>
                            </div>
                            <div class="text-right font-bold text-primary">{{ number_format($item->price * $item->quantity) }} {{ $contentBlocks['product_currency']->content ?? 'EGP' }}</div>
                            <div class="text-right">
                                <button type="button" class="text-gray-400 hover:text-[#C4182A] transition-colors"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg></button>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <div class="p-10 text-center text-gray-body">
                            {{ $contentBlocks['cart_empty']->content ?? 'Your cart is empty.' }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Right Column: Cart Summary -->
            <div class="w-full lg:max-w-[380px] lg:w-[36%] shrink-0">
                <div class="bg-white border border-gray-border rounded-[16px] shadow-sm lg:sticky lg:top-[80px] xl:top-[100px]">
                    <div class="p-6 border-b border-gray-border">
                        <h2 class="font-space font-bold text-[20px] text-dark">{{ $contentBlocks['cart_title']->content ?? 'Order Summary' }}</h2>
                    </div>

                    <div class="p-6 pb-2">
                        <div class="space-y-4 mb-6">
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="text-gray-body">{{ $contentBlocks['cart_subtotal']->content ?? 'Subtotal' }}</span>
                                <span class="font-medium text-dark font-bold text-[16px]">{{ isset($cartTotal) ? number_format($cartTotal) : '0' }} {{ $contentBlocks['product_currency']->content ?? 'EGP' }}</span>
                            </div>
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="text-gray-body">{{ $contentBlocks['cart_shipping']->content ?? 'Shipping' }}</span>
                                <span class="text-gray-body italic">Calculated at checkout</span>
                            </div>
                            <div class="flex justify-between items-center text-[14px]">
                                <span class="text-gray-body">{{ $contentBlocks['cart_taxes']->content ?? 'Tax' }}</span>
                                <span class="text-gray-body italic">Calculated at checkout</span>
                            </div>
                        </div>

                        <div class="border-t border-gray-border pt-5 pb-6">
                            <div class="flex justify-between items-end mb-1">
                                <span class="font-bold text-[18px] text-dark">{{ $contentBlocks['cart_total']->content ?? 'Estimated Total' }}</span>
                                <span class="font-space text-[24px] text-primary tracking-tight font-bold">{{ isset($cartTotal) ? number_format($cartTotal) : '0' }} {{ $contentBlocks['product_currency']->content ?? 'EGP' }}</span>
                            </div>
                            <p class="text-[12px] text-gray-body text-right">Excludes tax & shipping</p>
                        </div>

                        <a href="{{ route('checkout') }}" class="w-full h-[56px] flex items-center justify-center text-[15px] bg-primary hover:bg-red-700 text-white font-medium rounded-[6px] transition-colors shadow-sm mb-4">
                            {{ $contentBlocks['cart_checkout_btn']->content ?? 'Proceed to Checkout' }}
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
