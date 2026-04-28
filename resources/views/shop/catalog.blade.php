@extends('layouts.app')

@section('title', 'Products Catalog - ATS')

@section('content')
    <div class="max-w-[1400px] mx-auto px-6 py-8 flex flex-col lg:flex-row items-start gap-8">
        
        <!-- Sidebar Filters -->
        <aside class="hidden lg:block w-[260px] flex-shrink-0">
            <!-- Breadcrumbs -->
            <div class="flex items-center gap-2 text-[13px] text-gray-body mb-8">
                <a href="{{ route('home') }}" class="text-gray-body hover:text-dark transition-colors">{{ $contentBlocks['catalog_breadcrumbs_home']->content ?? 'Home' }}</a>
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-gray-400"><path d="m9 18 6-6-6-6"/></svg>
                <span class="text-dark font-medium">{{ $contentBlocks['catalog_breadcrumbs_current']->content ?? 'All Products' }}</span>
            </div>

            <!-- Filters Header -->
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-2">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                    <h2 class="font-bold text-[16px]">Filters</h2>
                </div>
                <button id="clear-filters-btn" class="text-[13px] text-primary font-medium hover:underline">Clear All</button>
            </div>

            <!-- Category Section -->
            <div class="mb-10">
                <h3 class="font-semibold text-[14px] mb-4">Categories</h3>
                <ul class="space-y-3 pl-0 relative">
                    @foreach($categories as $category)
                    <li>
                        <label class="flex items-center justify-between cursor-pointer group" data-filter-type="category">
                            <div class="flex items-center gap-3">
                                <input type="checkbox" class="sr-only filter-input" value="{{ $category->name }}">
                                <div class="custom-checkbox">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                                </div>
                                <span class="text-[14px] text-dark group-hover:text-primary transition-colors">{{ $category->name }}</span>
                            </div>
                            <span class="bg-gray-light text-gray-body px-2 py-0.5 rounded-full text-[11px] font-medium border border-[#F3F4F6]">{{ $category->products_count }}</span>
                        </label>
                    </li>
                    @endforeach
                </ul>
            </div>

            <!-- Price Range Section -->
            <div class="mb-8">
                <h3 class="text-[14px] font-bold text-dark mb-4 uppercase tracking-wider">{{ $contentBlocks['catalog_price_title']->content ?? 'Price (EGP)' }}</h3>
                
                <!-- Dual Range Slider -->
                <div class="relative h-6 mb-6 px-0 price-slider-container" id="price-slider-container">
                    <!-- Custom Track Layers -->
                    <div class="absolute top-1/2 -translate-y-1/2 left-0 right-0 h-1 bg-[#DEE1E6] rounded-full z-0 pointer-events-none"></div>
                    <div id="price-active-track" class="absolute top-1/2 -translate-y-1/2 h-1 bg-primary rounded-full z-10 pointer-events-none" style="left: 2.5%; width: 72.5%;"></div>
                    
                    <input type="range" id="price-min" min="0" max="200000" value="5000" step="500"
                        class="absolute w-full h-full top-0 left-0 pointer-events-none bg-transparent appearance-none" style="z-index: 3;" dir="ltr">
                    <input type="range" id="price-max" min="0" max="200000" value="150000" step="500"
                        class="absolute w-full h-full top-0 left-0 pointer-events-none bg-transparent appearance-none" style="z-index: 4;" dir="ltr">
                </div>

                <div class="flex items-center justify-between gap-3">
                    <div class="relative rounded-lg border border-gray-border px-3 py-2 flex items-center bg-white shadow-sm flex-1">
                        <span class="text-[12px] text-gray-body mr-1">EGP</span>
                        <input type="text" id="price-min-display" value="5,000" class="w-full text-dark text-[13px] outline-none font-medium text-right bg-transparent">
                    </div>
                    <div class="w-3 h-px bg-[#DEE1E6] flex-shrink-0"></div>
                    <div class="relative rounded-lg border border-gray-border px-3 py-2 flex items-center bg-white shadow-sm flex-1">
                        <span class="text-[12px] text-gray-body mr-1">EGP</span>
                        <input type="text" id="price-max-display" value="150,000" class="w-full text-dark text-[13px] outline-none font-medium text-right bg-transparent">
                    </div>
                </div>
            </div>

            <!-- Brands Section -->
            <div class="mb-6 pt-6 border-t border-gray-border">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-[14px] font-bold text-dark mb-4 uppercase tracking-wider">{{ $contentBlocks['catalog_brands_title']->content ?? 'Brands' }}</h3>
                    <button class="text-gray-body hover:text-dark"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.35-4.35"/></svg></button>
                </div>
                <ul class="space-y-3 pl-0">
                    <li>
                        <label class="flex items-center gap-3 cursor-pointer group" data-filter-type="brand">
                            <input type="checkbox" class="sr-only filter-input" value="Cisco" checked>
                            <div class="custom-checkbox active">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                            </div>
                            <span class="text-[14px] text-dark group-hover:text-primary transition-colors text-primary font-bold">Cisco</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center gap-3 cursor-pointer group" data-filter-type="brand">
                            <input type="checkbox" class="sr-only filter-input" value="Dell Technologies">
                            <div class="custom-checkbox">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                            </div>
                            <span class="text-[14px] text-dark group-hover:text-primary transition-colors">Dell Technologies</span>
                        </label>
                    </li>
                    <li>
                        <label class="flex items-center gap-3 cursor-pointer group" data-filter-type="brand">
                            <input type="checkbox" class="sr-only filter-input" value="Lenovo">
                            <div class="custom-checkbox">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                            </div>
                            <span class="text-[14px] text-dark group-hover:text-primary transition-colors">Lenovo</span>
                        </label>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- MOBILE FILTER & COUNT BAR (lg:hidden) -->
        <div class="lg:hidden w-full mb-6">
            <div class="flex items-center justify-between mt-2">
                <button id="openMobileFilters" class="flex items-center gap-2 bg-white border border-gray-border px-4 py-2.5 rounded-xl text-[13px] font-bold text-dark shadow-sm active:scale-95 transition-transform">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/></svg>
                    Filters & Sort
                </button>
                <div class="text-[12px] text-gray-body font-medium">
                    <strong id="mobile-results-count" class="text-dark">243</strong> Products
                </div>
            </div>
        </div>

        <!-- Filter Drawer Overlay -->
        <div id="filterOverlay" class="fixed inset-0 bg-dark/40 z-[120] hidden transition-opacity duration-300"></div>

        <!-- FILTER DRAWER (Mobile) -->
        <div id="filterDrawer" class="fixed top-0 right-0 w-[85%] max-w-[340px] h-full bg-white z-[121] shadow-2xl transition-transform duration-300 transform translate-x-full lg:hidden flex flex-col">
            <div class="p-6 border-b border-gray-border flex justify-between items-center bg-gray-light/30">
                <h3 class="font-space font-bold text-[18px]">Filters</h3>
                <button id="closeFilterDrawer" class="text-gray-body"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
            </div>
            <div class="flex-1 overflow-y-auto p-6 space-y-10 no-scrollbar">
                <!-- Sort By (Mobile Only) -->
                <div>
                   <h4 class="font-bold text-[14px] mb-4">Sort By</h4>
                   <div class="grid grid-cols-1 gap-2">
                       <button class="text-left px-4 py-3 rounded-lg border border-primary bg-red-50 text-primary font-bold text-[13px]">Featured</button>
                       <button class="text-left px-4 py-3 rounded-lg border border-gray-border text-dark font-medium text-[13px]">Price: Low to High</button>
                       <button class="text-left px-4 py-3 rounded-lg border border-gray-border text-dark font-medium text-[13px]">Price: High to Low</button>
                   </div>
                </div>

                <!-- Categories -->
                <div>
                   <h4 class="font-bold text-[14px] mb-4">Categories</h4>
                   <ul class="space-y-4">
                       @foreach($categories as $category)
                       <li>
                           <label class="flex items-center justify-between cursor-pointer group" data-filter-type="category">
                               <div class="flex items-center gap-3">
                                   <input type="checkbox" class="sr-only filter-input" value="{{ $category->name }}">
                                   <div class="custom-checkbox">
                                       <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                                   </div>
                                   <span class="text-[14px] text-dark group-hover:text-primary transition-colors">{{ $category->name }}</span>
                               </div>
                               <span class="bg-gray-light text-gray-body px-2 py-0.5 rounded-full text-[11px] font-medium border border-[#F3F4F6]">{{ $category->products_count }}</span>
                           </label>
                       </li>
                       @endforeach
                   </ul>
                </div>

                <!-- Price Range (Mobile) -->
                <div class="pt-6 border-t border-gray-border">
                    <h4 class="font-bold text-[14px] mb-6">Price (EGP)</h4>
                    
                    <div class="relative h-6 mb-6 px-0 price-slider-container" id="mobile-price-slider-container">
                        <div class="absolute top-1/2 -translate-y-1/2 left-0 right-0 h-1 bg-[#DEE1E6] rounded-full z-0 pointer-events-none"></div>
                        <div id="mobile-price-active-track" class="absolute top-1/2 -translate-y-1/2 h-1 bg-primary rounded-full z-10 pointer-events-none" style="left: 2.5%; width: 72.5%;"></div>
                        
                        <input type="range" id="mobile-price-min" min="0" max="200000" value="5000" step="500"
                            class="absolute w-full h-full top-0 left-0 pointer-events-none bg-transparent appearance-none" style="z-index: 3;" dir="ltr">
                        <input type="range" id="mobile-price-max" min="0" max="200000" value="150000" step="500"
                            class="absolute w-full h-full top-0 left-0 pointer-events-none bg-transparent appearance-none" style="z-index: 4;" dir="ltr">
                    </div>

                    <div class="flex items-center justify-between gap-3">
                        <div class="relative rounded-lg border border-gray-border px-3 py-2 flex items-center bg-white shadow-sm flex-1">
                            <span class="text-[12px] text-gray-body mr-1">EGP</span>
                            <input type="text" id="mobile-price-min-display" value="5,000" class="w-full text-dark text-[13px] outline-none font-medium text-right bg-transparent">
                        </div>
                        <div class="w-3 h-px bg-[#DEE1E6] flex-shrink-0"></div>
                        <div class="relative rounded-lg border border-gray-border px-3 py-2 flex items-center bg-white shadow-sm flex-1">
                            <span class="text-[12px] text-gray-body mr-1">EGP</span>
                            <input type="text" id="mobile-price-max-display" value="150,000" class="w-full text-dark text-[13px] outline-none font-medium text-right bg-transparent">
                        </div>
                    </div>
                </div>

                <!-- Brands (Mobile) -->
                <div class="pt-6 border-t border-gray-border">
                    <h4 class="font-bold text-[14px] mb-4">Brands</h4>
                    <ul class="space-y-4">
                        <li>
                            <label class="flex items-center gap-3 cursor-pointer group" data-filter-type="brand">
                                <input type="checkbox" class="sr-only filter-input" value="Cisco" checked>
                                <div class="custom-checkbox active">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                                </div>
                                <span class="text-[14px] text-dark group-hover:text-primary transition-colors">Cisco</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center gap-3 cursor-pointer group" data-filter-type="brand">
                                <input type="checkbox" class="sr-only filter-input" value="Dell Technologies">
                                <div class="custom-checkbox">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                                </div>
                                <span class="text-[14px] text-dark group-hover:text-primary transition-colors">Dell Technologies</span>
                            </label>
                        </li>
                        <li>
                            <label class="flex items-center gap-3 cursor-pointer group" data-filter-type="brand">
                                <input type="checkbox" class="sr-only filter-input" value="Lenovo">
                                <div class="custom-checkbox">
                                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 7 9 18 4 13"/></svg>
                                </div>
                                <span class="text-[14px] text-dark group-hover:text-primary transition-colors">Lenovo</span>
                            </label>
                        </li>
                    </ul>
                </div>
                
                <div class="pt-4 border-t border-gray-border">
                    <button id="applyFiltersBtn" class="w-full h-10 bg-primary text-white text-[13px] font-bold rounded hover:bg-[#C4182A] transition-colors shadow-sm">{{ $contentBlocks['catalog_apply_filters']->content ?? 'Apply Filters' }}</button>
                </div>
            </div>
        </div>

        <!-- Main Product Area -->
        <main class="flex-1 w-full min-w-0">
            <!-- Toolbar -->
            <div class="hidden lg:flex bg-white border border-gray-border rounded-lg px-4 py-3 mb-8 shadow-sm items-center justify-between gap-4">
                <div class="flex items-center flex-wrap gap-2 text-[13px]">
                    <span id="catalog-toolbar-count" class="text-gray-body font-space">Showing <strong class="text-dark">{{ $products->firstItem() ?? 0 }}-{{ $products->lastItem() ?? 0 }}</strong> of <strong class="text-dark">{{ $products->total() }}</strong> products</span>

                    <div class="h-4 w-px bg-gray-border mx-1"></div>
                    
                    <!-- Active Tags -->
                    <div id="filter-tags-container" class="flex items-center gap-2">
                        <span class="bg-gray-light border border-gray-border text-dark px-3 py-1 rounded-full flex items-center gap-2 text-[12px]">
                            Cisco
                            <button class="text-gray-body hover:text-primary"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
                        </span>
                    </div>
                </div>

                <div class="flex items-center gap-2 text-[13px]">
                    <span class="text-gray-body whitespace-nowrap">{{ $contentBlocks['catalog_sort_title']->content ?? 'Sort By' }}:</span>
                    <div class="relative">
                        <select id="catalog-sort-select" class="appearance-none bg-white border border-gray-border rounded-md pl-3 pr-8 py-1.5 focus:outline-none focus:border-primary text-dark font-medium shadow-sm min-w-[140px]">
                            <option>Featured</option>
                            <option>Price: Low to High</option>
                            <option>Price: High to Low</option>
                            <option>Newest Arrivals</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-body">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m6 9 6 6 6-6"/></svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-6 mb-10">
                @forelse($products as $product)
                <!-- Product Card -->
                <div data-href="{{ route('product.show', $product->id) }}" data-brand="{{ $product->brand ?? 'Unknown' }}" data-price="{{ $product->price }}" data-category="{{ $product->category->name ?? 'Uncategorized' }}" class="bg-white border border-gray-border rounded-xl overflow-hidden hover-lift flex flex-col group relative cursor-pointer product-card" onclick="window.location.href=this.dataset.href">
                    @if($product->sale_price)
                    <div class="absolute top-0 left-4 bg-primary text-white text-[11px] font-bold px-2 py-1 rounded-b-md z-10 shadow-sm">{{ __('Sale') }}</div>
                    @endif
                    <div class="bg-gray-light p-6 aspect-[4/3] flex items-center justify-center relative overflow-hidden">
                        <img src="{{ $product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $product->title }}" class="w-full h-full object-contain mix-blend-multiply group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-5 flex flex-col flex-1">
                        <div class="flex justify-between items-start mb-2">
                            <span class="text-[11px] text-gray-body uppercase tracking-wider font-semibold">{{ $product->brand ?? 'ATS' }}</span>
                            <div class="flex items-center gap-1 text-[12px] text-gray-body">
                                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="#F59E0B" stroke-width="2" class="fill-[#F59E0B]"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                                5.0
                            </div>
                        </div>
                        <h3 class="font-semibold text-[14px] leading-snug mb-4 line-clamp-2">{{ $product->title }}</h3>
                        
                        <div class="mt-auto flex items-end justify-between">
                            <div>
                                @if($product->sale_price)
                                <p class="text-[12px] text-gray-400 line-through mb-0.5">{{ number_format($product->price) }} EGP</p>
                                <p class="font-bold text-[18px]">{{ number_format($product->sale_price) }} <span class="text-[12px] font-normal text-gray-body">EGP</span></p>
                                @else
                                <p class="font-bold text-[18px]">{{ number_format($product->price) }} <span class="text-[12px] font-normal text-gray-body">EGP</span></p>
                                @endif
                            </div>
                            <button class="w-9 h-9 border border-gray-border rounded bg-white flex items-center justify-center hover:bg-gray-50 transition-colors shadow-sm z-20 text-dark add-to-cart-btn"
                                data-id="{{ $product->id }}" 
                                data-name="{{ $product->title }}" 
                                data-price="{{ $product->sale_price ?: $product->price }}" 
                                data-image="{{ $product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}"
                                onclick="event.stopPropagation();">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                            </button>
                        </div>
                    </div>
                    <div class="border-t border-gray-border px-5 py-3 text-[11px] text-dark font-medium bg-[#FAFAFB]">{{ $product->stock_status ?? 'In Stock & Ready to Ship' }}</div>
                </div>
                @empty
                <div class="col-span-full py-12 text-center text-gray-body">
                    {{ __('No products found matching your criteria.') }}
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="mt-8 flex justify-center">
                {{ $products->links() }}
            </div>
        </main>
    </div>
@endsection
