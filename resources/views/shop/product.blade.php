@extends('layouts.app')

@section('title', 'Product Details - ATS')

@section('content')
    <div class="max-w-[1280px] mx-auto px-6 py-8">

        <div class="grid lg:grid-cols-2 gap-12 mb-16 items-start">
            <!-- Product Images -->
            <div class="flex flex-col gap-4">
                <div class="bg-gray-200 lg:rounded-[20px] aspect-square lg:aspect-square max-h-[50vh] lg:max-h-none relative flex items-center justify-center overflow-hidden -mx-6 lg:mx-0">
<<<<<<< Updated upstream
                    @if($product->sale_price)
                    <span class="absolute top-6 left-6 bg-[#365EE2] text-white text-[12px] font-bold tracking-wide px-3 py-1 rounded-full z-10 box-shadow">{{ $contentBlocks['product_sale_badge']->content ?? 'Sale' }}</span>
                    @endif
                    <img src="{{ $product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $product->title }}" class="w-full h-full object-cover mix-blend-multiply transition-transform duration-500 hover:scale-105 cursor-zoom-in" id="mainProductImage">
                </div>
                
                @if($product->getMedia('default')->count() > 1)
                <div class="flex lg:grid lg:grid-cols-4 gap-3 overflow-x-auto lg:overflow-visible no-scrollbar pb-2 lg:pb-0">
                    @foreach($product->getMedia('default') as $media)
                    <div class="bg-gray-200 rounded-lg aspect-square border-2 {{ $loop->first ? 'border-primary' : 'border-transparent hover:border-gray-border' }} overflow-hidden cursor-pointer product-thumb" data-src="{{ $media->getUrl() }}">
                        <img src="{{ $media->getUrl() }}" alt="{{ $product->title }}" class="w-full h-full object-cover mix-blend-multiply {{ !$loop->first ? 'opacity-50' : '' }}">
=======
                    @if($product->created_at && $product->created_at->diffInDays(now()) < 30)
                        <span class="absolute top-6 left-6 bg-[#365EE2] text-white text-[12px] font-bold tracking-wide px-3 py-1 rounded-full z-10 box-shadow">New Arrival</span>
                    @endif
                    <img src="{{ $product->hasMedia('gallery') ? $product->getFirstMediaUrl('gallery', 'preview') ?: $product->getFirstMediaUrl('gallery') : asset('assets/images/downloaded/photo_1557825835_70d97c4aa567.jpg') }}" alt="{{ $product->name }}" class="w-full h-full object-cover mix-blend-multiply transition-transform duration-500 hover:scale-105 cursor-zoom-in" id="mainProductImage">
                </div>
                
                @if($product->hasMedia('gallery') && $product->getMedia('gallery')->count() > 1)
                <div class="flex lg:grid lg:grid-cols-4 gap-3 overflow-x-auto lg:overflow-visible no-scrollbar pb-2 lg:pb-0">
                    @foreach($product->getMedia('gallery') as $index => $media)
                    <div class="bg-gray-200 rounded-lg aspect-square border-2 {{ $index === 0 ? 'border-primary' : 'border-transparent hover:border-gray-border' }} overflow-hidden cursor-pointer product-thumb" data-src="{{ $media->getUrl() }}">
                        <img src="{{ $media->hasGeneratedConversion('thumbnail') ? $media->getUrl('thumbnail') : $media->getUrl() }}" alt="Thumbnail {{ $index + 1 }}" class="w-full h-full object-cover mix-blend-multiply {{ $index === 0 ? '' : 'opacity-50' }}">
>>>>>>> Stashed changes
                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <!-- Product Info -->
            <div>
                <div class="flex items-center justify-between mb-2">
<<<<<<< Updated upstream
                    <span class="text-primary font-bold text-[11px] tracking-wider uppercase">{{ $product->brand ?? 'ATS SOLUTIONS' }}</span>
=======
                    <span class="text-primary font-bold text-[11px] tracking-wider uppercase">{{ $product->brand ?? 'ATS' }}</span>
>>>>>>> Stashed changes
                    <div class="flex items-center gap-4 text-[13px] text-gray-body">
                        <button id="shareBtn" class="flex items-center gap-1.5 hover:text-dark">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg> {{ $contentBlocks['product_share_btn']->content ?? 'Share' }}
                        </button>
<<<<<<< Updated upstream
                    </div>
                </div>

                <h1 class="text-[32px] font-bold text-dark leading-tight mb-4 tracking-tight">{{ $product->title }}</h1>
=======
                        <span>SKU: {{ $product->sku }}</span>
                    </div>
                </div>

                <h1 class="text-[32px] font-bold text-dark leading-tight mb-4 tracking-tight">{{ $product->name }}</h1>
>>>>>>> Stashed changes
                
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex gap-1 text-[#F59E0B]">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77V2z"/></svg>
                    </div>
<<<<<<< Updated upstream
                    <span class="text-[14px] font-bold">5.0</span>
=======
                    <span class="text-[14px] font-bold">4.8</span>
                    <span class="text-[14px] text-gray-body underline hover:text-dark cursor-pointer">({{ $product->reviews ? $product->reviews->count() : 0 }} Reviews)</span>
>>>>>>> Stashed changes
                </div>

                <div class="mb-8">
                    <p class="text-[12px] text-gray-body mb-2">{{ $contentBlocks['product_price_lbl']->content ?? 'Price' }}</p>
                    <div class="flex items-center gap-6">
                        @if($product->sale_price)
<<<<<<< Updated upstream
                        <div class="text-[20px] text-gray-400 line-through leading-none">{{ number_format($product->price) }} {{ $contentBlocks['product_currency']->content ?? 'EGP' }}</div>
                        <div class="font-bold text-[36px] text-dark leading-none">{{ number_format($product->sale_price) }} <span class="text-[16px] text-gray-body font-normal ml-1 box-border align-baseline">{{ $contentBlocks['product_currency']->content ?? 'EGP' }}</span></div>
                        @else
                        <div class="font-bold text-[36px] text-dark leading-none">{{ number_format($product->price) }} <span class="text-[16px] text-gray-body font-normal ml-1 box-border align-baseline">{{ $contentBlocks['product_currency']->content ?? 'EGP' }}</span></div>
                        @endif
                        <div class="bg-white border border-[#DEE1E6] rounded-full px-4 py-1.5 flex items-center gap-2 text-[13px] font-medium text-dark">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            {{ $product->stock_status ?? 'In Stock' }}
=======
                            <div class="flex flex-col">
                                <span class="text-[16px] text-gray-400 line-through">{{ number_format($product->price) }} EGP</span>
                                <div class="font-bold text-[36px] text-dark leading-none">{{ number_format($product->sale_price) }} <span class="text-[16px] text-gray-body font-normal ml-1 box-border align-baseline">EGP</span></div>
                            </div>
                        @else
                            <div class="font-bold text-[36px] text-dark leading-none">{{ number_format($product->price) }} <span class="text-[16px] text-gray-body font-normal ml-1 box-border align-baseline">EGP</span></div>
                        @endif
                        
                        <div class="bg-white border border-[#DEE1E6] rounded-full px-4 py-1.5 flex items-center gap-2 text-[13px] font-medium text-dark">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            @if($product->stock_status && isset($product->stock_status['status']) && $product->stock_status['status'] == 'in_stock')
                                In Stock (Ready to ship)
                            @else
                                {{ $product->stock_status['status'] ?? 'Available' }}
                            @endif
>>>>>>> Stashed changes
                        </div>
                    </div>
                </div>

<<<<<<< Updated upstream
                <div class="border-t border-gray-border py-8 text-[15px] text-[#565D6D] leading-relaxed prose max-w-none">
                    {!! $product->description !!}
=======
                <div class="border-t border-gray-border py-8 text-[15px] text-[#565D6D] leading-relaxed">
                    {!! $product->description !!}
                    
                    @if($product->features_list)
                    <ul class="space-y-3 mt-4">
                        @foreach($product->features_list as $feature)
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>{{ is_array($feature) ? ($feature['feature'] ?? '') : $feature }}</li>
                        @endforeach
                    </ul>
                    @endif
>>>>>>> Stashed changes
                </div>

                <div class="flex border-t border-gray-border py-8 flex-col sm:flex-row gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="product-qty-input" class="text-[12px] text-gray-body">{{ $contentBlocks['product_qty_lbl']->content ?? 'Quantity' }}</label>
                        <div class="flex items-center border border-gray-border rounded bg-white h-12 w-[120px]">
                            <button id="product-qty-minus" type="button" class="w-10 h-full flex items-center justify-center text-gray-body hover:text-primary transition-colors hover:bg-gray-50 border-r border-gray-border">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            </button>
                            <input id="product-qty-input" type="text" inputmode="numeric" value="1" min="1" aria-label="Quantity" class="flex-1 h-full w-[40px] text-center outline-none font-medium text-[15px] bg-transparent text-dark appearance-none shrink-0" readonly>
                            <button id="product-qty-plus" type="button" class="w-10 h-full flex items-center justify-center text-gray-body hover:text-primary transition-colors hover:bg-gray-50 border-l border-gray-border shrink-0">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            </button>
                        </div>
                    </div>
                    
                    <div class="flex-1 flex gap-3 sm:mt-[24px]">
                        <button class="flex-1 bg-primary text-white font-bold text-[15px] rounded border border-transparent hover:bg-red-700 transition-all flex items-center justify-center gap-2 h-12 shadow-sm add-to-cart-btn shrink-0 whitespace-nowrap px-4" 
                            data-use-page-qty="true"
                            data-id="{{ $product->id }}"
<<<<<<< Updated upstream
                            data-name="{{ $product->title }}" 
                            data-price="{{ $product->sale_price ?: $product->price }}" 
                            data-image="{{ $product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="shrink-0"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg> {{ $contentBlocks['product_add_cart']->content ?? 'Add to Cart' }}
=======
                            data-name="{{ $product->name }}" 
                            data-price="{{ $product->sale_price ?? $product->price }}" 
                            data-image="{{ $product->getFirstMediaUrl('gallery') }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="shrink-0"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg> Add to Cart
>>>>>>> Stashed changes
                        </button>
                        <a href="{{ route('checkout') }}" class="flex-1 bg-dark text-white font-bold text-[15px] rounded border border-transparent hover:bg-black transition-all flex items-center justify-center gap-2 h-12 shadow-sm shrink-0 whitespace-nowrap px-4">
                            {{ $contentBlocks['product_checkout']->content ?? 'Checkout' }}
                        </a>
                        <button id="wishlistBtn" class="w-12 h-12 rounded border border-gray-border bg-white flex items-center justify-center text-gray-body hover:text-primary hover:border-primary transition-all shrink-0 shadow-sm">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="bg-gray-light border border-gray-border rounded-lg p-5 flex flex-wrap gap-x-8 gap-y-4 text-[13px] font-medium text-dark">
                    <div class="flex items-center gap-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                        <span>{{ $contentBlocks['product_warranty']->content ?? '2 Year Warranty' }}</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                        <span>{{ $contentBlocks['product_delivery']->content ?? 'Free Delivery' }}</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2"><path d="M2.5 2v6h6M2.66 15.57a10 10 0 1 0 .57-8.38l-3.15 3.15"/></svg>
                        <span>{{ $contentBlocks['product_returns']->content ?? '14-Day Returns' }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabs -->
        <div class="mb-16">
            <div class="flex items-center gap-8 border-b border-gray-border mb-8 overflow-x-auto scrollbar-hide">
                <button class="pb-4 text-[15px] font-medium text-gray-body border-b-2 border-transparent hover:text-dark transition-colors whitespace-nowrap tab-btn" data-tab="overview">Overview</button>
                <button class="pb-4 text-[15px] font-medium text-dark border-b-2 border-primary transition-colors whitespace-nowrap tab-btn tab-active" data-tab="specs">Tech Specs</button>
                <button class="pb-4 text-[15px] font-medium text-gray-body border-b-2 border-transparent hover:text-dark transition-colors whitespace-nowrap flex items-center gap-2 tab-btn" data-tab="reviews">Reviews <span class="bg-gray-100 text-dark text-[11px] px-2 py-0.5 rounded-full font-semibold">124</span></button>
            </div>

            <!-- Tech Specs Content -->
            <div class="max-w-[700px] tab-panel" id="tab-overview">
                <div class="prose max-w-none">
                    {!! $product->description !!}
                </div>
            </div>

            <div class="max-w-[700px] tab-panel tab-panel-active" id="tab-specs">
                <div class="border border-gray-border rounded-xl bg-white overflow-hidden text-[14px]">
                    @if($product->specifications && is_array($product->specifications))
                        @foreach($product->specifications as $key => $value)
                        <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
<<<<<<< Updated upstream
                            <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">{{ $key }}</div>
                            <div class="p-5 text-dark font-medium">{{ $value }}</div>
                        </div>
                        @endforeach
                    @else
                        <div class="p-5 text-gray-body text-center">{{ __('No specifications available.') }}</div>
=======
                            <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">{{ is_array($value) ? ($value['key'] ?? $key) : $key }}</div>
                            <div class="p-5 text-dark font-medium">{{ is_array($value) ? ($value['value'] ?? '') : $value }}</div>
                        </div>
                        @endforeach
                    @else
                        <div class="p-5 text-center text-gray-body">No specifications available.</div>
>>>>>>> Stashed changes
                    @endif
                </div>
            </div>

            <div class="max-w-[700px] tab-panel" id="tab-reviews">
                <div class="space-y-6">
                    <div class="flex items-center gap-4 mb-8">
                        <div class="text-center">
                            <div class="text-[48px] font-bold text-dark leading-none">4.8</div>
                            <div class="flex gap-0.5 text-[#F59E0B] mt-2 justify-center">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77V2z"/></svg>
                            </div>
                            <p class="text-[13px] text-gray-body mt-1">124 reviews</p>
                        </div>
                    </div>
                    <div class="border border-gray-border rounded-xl p-6 bg-white">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-[14px]">MA</div>
                            <div>
                                <p class="font-medium text-[14px] text-dark">Mohamed Ali</p>
                                <div class="flex items-center gap-2"><div class="flex gap-0.5 text-[#F59E0B]"><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg></div><span class="text-[12px] text-gray-body">2 weeks ago</span></div>
                            </div>
                        </div>
                        <p class="text-[14px] text-[#565D6D] leading-relaxed">Excellent camera for our office security setup. The AI detection is remarkably accurate and the night vision quality exceeded our expectations. Installation was straightforward with PoE support.</p>
                    </div>
                    <div class="border border-gray-border rounded-xl p-6 bg-white">
                        <div class="flex items-center gap-3 mb-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-[14px]">SK</div>
                            <div>
                                <p class="font-medium text-[14px] text-dark">Sara Khaled</p>
                                <div class="flex items-center gap-2"><div class="flex gap-0.5 text-[#F59E0B]"><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2" class="fill-[#F59E0B]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77V2z"/></svg></div><span class="text-[12px] text-gray-body">1 month ago</span></div>
                            </div>
                        </div>
                        <p class="text-[14px] text-[#565D6D] leading-relaxed">Great image quality but the mobile app could use some improvement. Overall very satisfied with the product and the support from ATS team was exceptional.</p>
                    </div>
                </div>
            </div>
        </div>

@php
            $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->where('is_active', true)->take(4)->get();
        @endphp
        @if($relatedProducts->count() > 0)
        <!-- Frequently Bought Together -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-[20px] font-bold text-dark">{{ __('Frequently Bought Together') }}</h2>
                <a href="{{ route('catalog') }}" class="text-[13px] text-primary font-medium flex items-center gap-1 hover:underline">{{ __('View All') }} <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg></a>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach($relatedProducts as $related)
<<<<<<< Updated upstream
                <div class="bg-white border border-gray-border rounded-xl overflow-hidden hover-lift flex flex-col cursor-pointer" onclick="window.location.href='{{ route('product.show', $related->id) }}'">
                    <div class="bg-gray-light aspect-square p-4 flex items-center justify-center border-b border-gray-border">
                        <img src="{{ $related->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $related->title }}" class="w-full h-full object-contain mix-blend-multiply">
                    </div>
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h3 class="font-semibold text-[13px] leading-snug mb-3">{{ $related->title }}</h3>
                        <div class="mt-auto flex items-end justify-between">
                            <span class="font-bold text-[15px] text-primary">{{ number_format($related->sale_price ?: $related->price) }} <span class="text-[11px] font-normal">EGP</span></span>
                            <button class="w-8 h-8 rounded border border-gray-border text-gray-body hover:text-primary hover:border-primary transition-colors flex items-center justify-center add-to-cart-btn"
                                data-id="{{ $related->id }}" 
                                data-name="{{ $related->title }}" 
                                data-price="{{ $related->sale_price ?: $related->price }}" 
                                data-image="{{ $related->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}"
                                onclick="event.stopPropagation();">
=======
                <div data-href="{{ route('product', $related->id) }}" class="bg-white border border-gray-border rounded-xl overflow-hidden hover-lift flex flex-col cursor-pointer product-card">
                    <div class="bg-gray-light aspect-square p-4 flex items-center justify-center border-b border-gray-border relative">
                        @if($related->sale_price)
                            <div class="absolute top-0 left-0 bg-primary text-white text-[10px] font-bold px-2 py-1 rounded-br-md z-10 shadow-sm">Sale</div>
                        @endif
                        <img src="{{ $related->hasMedia('gallery') ? $related->getFirstMediaUrl('gallery', 'webp') ?: $related->getFirstMediaUrl('gallery') : asset('assets/images/downloaded/photo_1544197150_b99a580bb7a8.jpg') }}" alt="{{ $related->name }}" class="w-full h-full object-contain mix-blend-multiply">
                    </div>
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h3 class="font-semibold text-[13px] leading-snug mb-3 line-clamp-2">{{ $related->name }}</h3>
                        <div class="mt-auto flex items-end justify-between">
                            @if($related->sale_price)
                                <span class="font-bold text-[15px] text-primary">{{ number_format($related->sale_price) }} <span class="text-[11px] font-normal">EGP</span></span>
                            @else
                                <span class="font-bold text-[15px] text-primary">{{ number_format($related->price) }} <span class="text-[11px] font-normal">EGP</span></span>
                            @endif
                            <button class="w-8 h-8 rounded border border-gray-border text-gray-body hover:text-primary hover:border-primary transition-colors flex items-center justify-center add-to-cart-btn z-20"
                                data-id="{{ $related->id }}" 
                                data-name="{{ $related->name }}" 
                                data-price="{{ $related->sale_price ?? $related->price }}" 
                                data-image="{{ $related->getFirstMediaUrl('gallery') }}">
>>>>>>> Stashed changes
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
@endsection
