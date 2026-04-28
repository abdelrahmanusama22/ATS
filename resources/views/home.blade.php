@extends('layouts.app')

@section('title', 'ATS - Enterprise IT Infrastructure')

@section('content')
    @forelse($sliders ?? [] as $slider)
    <!-- Hero Section -->
    <section class="hidden lg:grid max-w-[1280px] mx-auto px-6 md:px-10 py-16 md:py-24 grid lg:grid-cols-[1.2fr_1fr] gap-12 items-center relative">
        <div class="bg-[radial-gradient(circle_at_20%_50%,_rgba(226,29,46,0.04)_0%,_rgba(255,255,255,0)_60%)] absolute inset-0 -z-10 hidden lg:block pointer-events-none"></div>
        <div>
            <h1 class="text-[48px] md:text-[64px] font-bold leading-[1.05] tracking-tight mb-6">
                {{ $slider->title }}
            </h1>
            <p class="text-gray-body text-[16px] leading-[1.6] mb-10 max-w-[460px]">{{ $slider->subtitle }}</p>

            <div class="flex flex-wrap items-center gap-4 mb-10">
                <a href="{{ $slider->link ?? '#' }}" class="bg-primary text-white hover:bg-[#C4182A] px-7 py-3 rounded-md text-[14px] font-medium transition-colors flex items-center gap-2">
                    {{ $slider->button_text ?: 'Shop Now' }}
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7" /></svg>
                </a>
            </div>
        </div>

        <div class="relative w-full aspect-[4/3] lg:aspect-[5/4] rtl-flip hover-lift">
            <div class="w-full h-full rounded-[24px] overflow-hidden bg-gray-200">
                <img src="{{ $slider->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $slider->title }}" class="w-full h-full object-cover">
            </div>
        </div>
    </section>

    <!-- MOBILE HERO (lg:hidden) -->
    <section class="block lg:hidden relative h-[320px] w-full overflow-hidden">
        <img src="{{ $slider->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $slider->title }}" class="absolute inset-0 w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 pb-12">
            <h2 class="text-white font-space font-bold text-[30px] leading-tight mb-3">{{ $slider->title }}</h2>
            <p class="text-gray-200 text-[14px] leading-tight mb-6 max-w-[320px]">{{ $slider->subtitle }}</p>
            <a href="{{ $slider->link ?? '#' }}" class="bg-primary text-white text-[16px] font-bold py-3.5 rounded-[10px] text-center w-full shadow-xl active:scale-95 transition-all">{{ $slider->button_text ?: 'Shop Now' }}</a>
        </div>
    </section>
    @empty
    <section class="max-w-[1280px] mx-auto px-6 md:px-10 py-16 md:py-24 text-center">
        <h1 class="text-[48px] md:text-[64px] font-bold leading-[1.05] tracking-tight mb-6">{{ $contentBlocks['home_hero_title']->content ?? 'Welcome to ATS' }}</h1>
        <p class="text-gray-body text-[16px] leading-[1.6] mb-10 max-w-[460px] mx-auto">{{ $contentBlocks['home_hero_description']->content ?? 'Discover enterprise-grade IT infrastructure solutions.' }}</p>
    </section>
    @endforelse

    <!-- MOBILE BROWSE CATEGORIES (lg:hidden) -->
    <section class="block lg:hidden bg-[#FAFAFB] py-8 px-4" id="mobileCategories">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-space font-bold text-[18px] text-dark">Browse Categories</h2>
            <a href="{{ route('catalog') }}" class="text-primary text-[12px] font-bold">View All</a>
        </div>
        <div class="grid grid-cols-4 gap-4">
            <a href="{{ route('catalog') }}" class="flex flex-col items-center gap-2">
                <div
                    class="w-[56px] h-[56px] bg-white rounded-xl grid place-items-center border border-gray-border shadow-sm shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <path
                            d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M8.53 16.11a6 6 0 016.95 0M12 20h.01" />
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-dark">Network</span>
            </a>
            <a href="{{ url('catalog') }}" class="flex flex-col items-center gap-2">
                <div
                    class="w-[56px] h-[56px] bg-white rounded-xl grid place-items-center border border-gray-border shadow-sm shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-dark">Security</span>
            </a>
            <a href="{{ url('catalog') }}" class="flex flex-col items-center gap-2">
                <div
                    class="w-[56px] h-[56px] bg-white rounded-full flex items-center justify-center border border-gray-border shadow-sm">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <rect x="2" y="2" width="20" height="8" rx="2" />
                        <rect x="2" y="14" width="20" height="8" rx="2" />
                        <line x1="6" y1="6" x2="6.01" y2="6" />
                        <line x1="6" y1="18" x2="6.01" y2="18" />
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-dark">Compute</span>
            </a>
            <a href="{{ url('catalog') }}" class="flex flex-col items-center gap-2">
                <div
                    class="w-[56px] h-[56px] bg-white rounded-full flex items-center justify-center border border-gray-border shadow-sm">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <path
                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                        <line x1="12" y1="22.08" x2="12" y2="12" />
                    </svg>
                </div>
                <span class="text-[11px] font-bold text-dark">Storage</span>
            </a>
        </div>
    </section>

    <!-- MOBILE FEATURED SOLUTIONS (lg:hidden) -->
    <section class="block lg:hidden py-10 px-4" id="mobileSolutions">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-space font-bold text-[18px] text-dark">Featured Solutions</h2>
            <a href="{{ route('solutions') }}" class="text-primary text-[12px] font-bold">View All</a>
        </div>
        <div class="flex overflow-x-auto gap-4 pb-4 scrollbar-hide -mx-4 px-4">
            <div class="min-w-[280px] bg-white border border-gray-border rounded-xl p-5 shadow-sm">
                <div class="w-10 h-10 bg-red-muted rounded-lg flex items-center justify-center text-primary mb-4">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path
                            d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M8.53 16.11a6 6 0 016.95 0M12 20h.01" />
                    </svg>
                </div>
                <h3 class="font-bold text-[15px] text-dark mb-2">Network Infrastructure</h3>
                <p class="text-[12px] text-gray-body leading-relaxed">High-performance connectivity solutions for
                    enterprises of all sizes.</p>
            </div>
            <div class="min-w-[280px] bg-white border border-gray-border rounded-xl p-5 shadow-sm">
                <div class="w-10 h-10 bg-red-muted rounded-lg flex items-center justify-center text-primary mb-4">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                </div>
                <h3 class="font-bold text-[15px] text-dark mb-2">Security & CCTV</h3>
                <p class="text-[12px] text-gray-body leading-relaxed">End-to-end security surveillance and
                    infrastructure protection.</p>
            </div>
        </div>
    </section>

    <!-- Desktop Sections (hidden on mobile) -->
    <section class="hidden lg:block max-w-[1280px] mx-auto px-6 md:px-10 py-20 border-t border-gray-border"
        id="desktopSolutions">
        <div class="flex justify-between items-end mb-10">
            <div>
                <h2 class="text-[24px] font-bold text-dark mb-2">Integrated Solutions</h2>
                <p class="text-[14px] text-gray-body">Comprehensive technology solutions tailored for modern business
                    environments.</p>
            </div>
            <a href="{{ route('solutions') }}"
                class="flex text-[14px] text-primary font-medium items-center gap-1 hover:underline">View all solutions
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7" />
                </svg></a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-white border border-gray-border rounded-lg p-6 hover:shadow-lg transition-all hover-lift flex flex-col h-full cursor-pointer">
                <div
                    class="w-10 h-10 rounded-full bg-[#FAFAFB] border border-[#DEE1E6] flex items-center justify-center mb-6">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#171A1F" stroke-width="1.5">
                        <path
                            d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M8.53 16.11a6 6 0 016.95 0M12 20h.01" />
                    </svg>
                </div>
                <h3 class="font-bold text-[16px] mb-3">Network Infrastructure</h3>
                <p class="text-[13px] text-gray-body leading-relaxed mb-6 flex-1">Robust routing and switching for
                    seamless connectivity.</p>
                <span class="text-[13px] text-primary font-medium flex items-center gap-1 mt-auto">Learn more <svg
                        width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></span>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-white border border-gray-border rounded-lg p-6 hover:shadow-lg transition-all hover-lift flex flex-col h-full cursor-pointer">
                <div
                    class="w-10 h-10 rounded-full bg-[#FAFAFB] border border-[#DEE1E6] flex items-center justify-center mb-6">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#171A1F" stroke-width="1.5">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                </div>
                <h3 class="font-bold text-[16px] mb-3">CCTV & Security</h3>
                <p class="text-[13px] text-gray-body leading-relaxed mb-6 flex-1">Advanced surveillance and access
                    control systems.</p>
                <span class="text-[13px] text-primary font-medium flex items-center gap-1 mt-auto">Learn more <svg
                        width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></span>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-white border border-gray-border rounded-lg p-6 hover:shadow-lg transition-all hover-lift flex flex-col h-full cursor-pointer">
                <div
                    class="w-10 h-10 rounded-full bg-[#FAFAFB] border border-[#DEE1E6] flex items-center justify-center mb-6">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#171A1F" stroke-width="1.5">
                        <rect x="2" y="2" width="20" height="8" rx="2" />
                        <rect x="2" y="14" width="20" height="8" rx="2" />
                        <line x1="6" y1="6" x2="6.01" y2="6" />
                        <line x1="6" y1="18" x2="6.01" y2="18" />
                    </svg>
                </div>
                <h3 class="font-bold text-[16px] mb-3">Cloud Servers</h3>
                <p class="text-[13px] text-gray-body leading-relaxed mb-6 flex-1">Scalable and secure cloud hosting
                    environments.</p>
                <span class="text-[13px] text-primary font-medium flex items-center gap-1 mt-auto">Learn more <svg
                        width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></span>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-white border border-gray-border rounded-lg p-6 hover:shadow-lg transition-all hover-lift flex flex-col h-full cursor-pointer">
                <div
                    class="w-10 h-10 rounded-full bg-[#FAFAFB] border border-[#DEE1E6] flex items-center justify-center mb-6">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#171A1F" stroke-width="1.5">
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <rect x="9" y="9" width="6" height="6" />
                    </svg>
                </div>
                <h3 class="font-bold text-[16px] mb-3">Smart Office</h3>
                <p class="text-[13px] text-gray-body leading-relaxed mb-6 flex-1">Automated workspace solutions for
                    modern teams.</p>
                <span class="text-[13px] text-primary font-medium flex items-center gap-1 mt-auto">Learn more <svg
                        width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></span>
            </div>
        </div>
    </section>

    <!-- Desktop Shop by Category (hidden on mobile) -->
    <section class="hidden lg:block max-w-[1280px] mx-auto px-6 md:px-10 py-12">
        <h2 class="text-center text-[20px] font-bold text-dark mb-8">Shop by Category</h2>
        <div
            class="flex overflow-x-auto pb-4 gap-4 sm:grid sm:grid-cols-3 lg:grid-cols-6 sm:overflow-visible sm:pb-0 scrollbar-hide">
            <a href="{{ route('catalog') }}"
                class="flex-shrink-0 w-[160px] sm:w-auto bg-white border border-gray-border rounded-lg p-6 flex flex-col items-center justify-center gap-4 hover:border-primary hover:text-primary transition-colors cursor-pointer hover-lift">
                <div class="w-12 h-12 bg-gray-light rounded-xl flex items-center justify-center shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <rect x="2" y="2" width="20" height="8" rx="2" />
                        <rect x="2" y="14" width="20" height="8" rx="2" />
                        <line x1="6" y1="6" x2="6.01" y2="6" />
                        <line x1="6" y1="18" x2="6.01" y2="18" />
                    </svg>
                </div>
                <span class="text-[13px] font-medium text-dark">Servers</span>
            </a>

            <a href="{{ url('catalog') }}"
                class="flex-shrink-0 w-[160px] sm:w-auto bg-white border border-gray-border rounded-lg p-6 flex flex-col items-center justify-center gap-4 hover:border-primary hover:text-primary transition-colors cursor-pointer hover-lift">
                <div class="w-12 h-12 bg-gray-light rounded-xl flex items-center justify-center shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <path
                            d="M5 12.55a11 11 0 0114.08 0M1.42 9a16 16 0 0121.16 0M8.53 16.11a6 6 0 016.95 0M12 20h.01" />
                    </svg>
                </div>
                <span class="text-[13px] font-medium text-dark">Networking</span>
            </a>

            <a href="{{ url('catalog') }}"
                class="flex-shrink-0 w-[160px] sm:w-auto bg-white border border-gray-border rounded-lg p-6 flex flex-col items-center justify-center gap-4 hover:border-primary hover:text-primary transition-colors cursor-pointer hover-lift">
                <div class="w-12 h-12 bg-gray-light rounded-xl flex items-center justify-center shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <path
                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                        <line x1="12" y1="22.08" x2="12" y2="12" />
                    </svg>
                </div>
                <span class="text-[13px] font-medium text-dark">Storage</span>
            </a>

            <a href="{{ url('catalog') }}"
                class="flex-shrink-0 w-[160px] sm:w-auto bg-white border border-gray-border rounded-lg p-6 flex flex-col items-center justify-center gap-4 hover:border-primary hover:text-primary transition-colors cursor-pointer hover-lift">
                <div class="w-12 h-12 bg-gray-light rounded-xl flex items-center justify-center shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <rect x="4" y="4" width="16" height="16" rx="2" />
                        <rect x="9" y="9" width="6" height="6" />
                    </svg>
                </div>
                <span class="text-[13px] font-medium text-dark">Components</span>
            </a>

            <a href="{{ url('catalog') }}"
                class="flex-shrink-0 w-[160px] sm:w-auto bg-white border border-gray-border rounded-lg p-6 flex flex-col items-center justify-center gap-4 hover:border-primary hover:text-primary transition-colors cursor-pointer hover-lift">
                <div class="w-12 h-12 bg-gray-light rounded-xl flex items-center justify-center shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <line x1="8" y1="21" x2="16" y2="21" />
                        <line x1="12" y1="17" x2="12" y2="21" />
                    </svg>
                </div>
                <span class="text-[13px] font-medium text-dark">Displays</span>
            </a>

            <a href="{{ url('catalog') }}"
                class="flex-shrink-0 w-[160px] sm:w-auto bg-white border border-gray-border rounded-lg p-6 flex flex-col items-center justify-center gap-4 hover:border-primary hover:text-primary transition-colors cursor-pointer hover-lift">
                <div class="w-12 h-12 bg-gray-light rounded-xl flex items-center justify-center shrink-0">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="1.5">
                        <path d="M3 18v-6a9 9 0 0 1 18 0v6" />
                        <path
                            d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z" />
                    </svg>
                </div>
                <span class="text-[13px] font-medium text-dark">Accessories</span>
            </a>
        </div>
    </section>

    <!-- MOBILE TRENDING HARDWARE (lg:hidden) -->
    <section class="block lg:hidden bg-[#FAFAFB] py-10 px-4" id="mobileHardware">
        <div class="flex justify-between items-center mb-6">
            <h2 class="font-space font-bold text-[18px] text-dark">Trending Hardware</h2>
            <a href="{{ route('catalog') }}" class="text-primary text-[12px] font-bold">View All</a>
        </div>
        <div class="grid grid-cols-2 gap-4">
            @forelse($topProducts ?? [] as $product)
            <div class="bg-white border border-gray-border rounded-xl p-3 shadow-sm flex flex-col cursor-pointer" onclick="window.location='{{ route('product.show', $product->id) }}'">
                <div class="relative bg-white aspect-square mb-3">
                    <span class="absolute top-0 left-0 bg-primary/10 text-primary text-[9px] font-bold px-1.5 py-0.5 rounded">Hot</span>
                    <img src="{{ $product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $product->name }}" class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-[13px] text-dark line-clamp-1 mb-2">{{ $product->name }}</h3>
                <div class="flex items-center justify-between mt-auto">
                    <span class="text-primary font-bold text-[14px]">{{ number_format($product->price) }}<span class="text-[10px] ml-0.5">EGP</span></span>
                </div>
            </div>
            @empty
                <div class="col-span-full text-center text-gray-body py-4">Check back soon for trending hardware!</div>
            @endforelse
        </div>
    </section>

    <!-- Desktop Best Sellers (hidden on mobile) -->
    <section class="hidden lg:block max-w-[1280px] mx-auto px-6 md:px-10 py-16" id="desktopHardware">
        <div class="flex justify-between items-center mb-10">
            <h2 class="text-[24px] font-bold text-dark">Best Sellers</h2>
            <a href="{{ route('catalog') }}"
                class="bg-white border border-gray-border text-dark text-[13px] font-medium px-4 py-2 rounded-md hover:bg-gray-50 transition-colors">View
                Catalog</a>
        </div>

        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse($topProducts ?? [] as $product)
            <div data-href="{{ route('product.show', $product->id) }}" onclick="window.location='{{ route('product.show', $product->id) }}'" class="bg-white border border-gray-border rounded-lg overflow-hidden flex flex-col hover-lift group relative cursor-pointer product-card">
                <div class="relative bg-gray-light aspect-square p-6 flex items-center justify-center">
                    <span class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded animate-soft-pulse z-10">Hot</span>
                    <img src="{{ $product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $product->name }}" class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-[12px] text-gray-body mb-1">{{ $product->category->name ?? 'Hardware' }}</p>
                    <h3 class="font-semibold text-[14px] text-dark leading-snug mb-4">{{ $product->name }}</h3>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="font-bold text-[16px]">{{ number_format($product->price) }}<span class="text-[12px] text-gray-body font-normal">EGP</span></span>
                    </div>
                </div>
            </div>
            @empty
                <div class="col-span-full text-center text-gray-body py-10">Check back soon for trending hardware!</div>
            @endforelse
        </div>
    </section>

    <!-- Brands -->
    <section class="border-y border-gray-border py-12 bg-white">
        <div
            class="max-w-[1280px] mx-auto px-6 md:px-10 flex flex-wrap justify-center sm:justify-between items-center gap-8 text-[20px] font-bold text-[#A5ABBA] tracking-wider uppercase opacity-80">
            <span class="hover:text-dark transition-colors cursor-pointer">Cisco</span>
            <span class="hover:text-dark transition-colors cursor-pointer">Dell</span>
            <span class="hover:text-dark transition-colors cursor-pointer">HP Enterprise</span>
            <span class="hover:text-dark transition-colors cursor-pointer">Ubiquiti</span>
            <span class="hover:text-dark transition-colors cursor-pointer">Synology</span>
            <span class="hover:text-dark transition-colors cursor-pointer">Fortinet</span>
        </div>
    </section>

    <div id="servicesAndTestimonials">
        <!-- MOBILE SERVICES (lg:hidden) -->
        <section class="block lg:hidden py-12 px-4 shadow-[0_-1px_0_0_rgba(0,0,0,0.05)]" id="mobileServices">
            <div class="flex justify-between items-center mb-6">
                <h2 class="font-space font-bold text-[18px] text-dark">Professional IT Services</h2>
                <a href="{{ url('services') }}" class="text-primary text-[12px] font-bold">View All</a>
            </div>
            <div class="space-y-4">
                @forelse($services ?? [] as $index => $service)
                <a href="{{ route('services') }}" class="flex items-center gap-4 bg-white border border-gray-border p-4 rounded-xl shadow-sm active:bg-gray-50 transition-colors">
                    <div class="w-12 h-12 bg-red-muted rounded-xl grid place-items-center text-primary shrink-0 font-bold">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="flex-1 min-w-0 pr-4">
                        <h4 class="font-bold text-[14px] text-dark">{{ $service->title }}</h4>
                        <p class="text-[11px] text-gray-body line-clamp-2">{!! strip_tags($service->description) !!}</p>
                    </div>
                    <span class="text-[#DEE1E6] text-[18px] leading-none" aria-hidden="true">&rsaquo;</span>
                </a>
                @empty
                    <div class="text-center text-gray-body py-4">We are updating our services catalog. Check back soon.</div>
                @endforelse
            </div>
        </section>

        <!-- Desktop Services (hidden on mobile) -->
        <section class="hidden lg:block max-w-[1280px] mx-auto px-6 md:px-10 py-24" id="desktopServices">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="w-full md:w-1/2 lg:w-[45%] xl:w-[40%] rounded-[24px] overflow-hidden aspect-square relative shadow-2xl">
                    <img src="{{ isset($contentBlocks['home_services_image']) && $contentBlocks['home_services_image']->hasMedia('default') ? $contentBlocks['home_services_image']->getFirstMediaUrl('default') : asset('assets/images/downloaded/photo_1573164713988_8665fc963095.jpg') }}" alt="Professional Services" class="w-full h-full object-cover">
                    <div class="absolute inset-0 border-[6px] border-white/20 m-4 rounded-[18px] pointer-events-none"></div>
                </div>
                <div class="order-1 lg:order-2">
                    <span class="text-[12px] bg-red-muted text-primary font-bold px-3 py-1 rounded inline-block mb-4">{{ $contentBlocks['home_services_subtitle']->content ?? 'Professional Services' }}</span>
                    <h2 class="text-[32px] md:text-[40px] font-bold text-dark leading-tight mb-4">{{ $contentBlocks['home_services_title']->content ?? 'Beyond Hardware. We Deliver Solutions.' }}</h2>
                    <p class="text-[15px] text-gray-body leading-relaxed mb-8 max-w-[500px]">{{ $contentBlocks['home_services_desc']->content ?? 'ATS provides comprehensive IT services to ensure your infrastructure operates at peak performance, securely and efficiently.' }}</p>
                    <ul class="space-y-4 mb-8">
                        @forelse($services ?? [] as $service)
                        <li class="flex gap-4">
                            <div class="w-6 h-6 rounded-xl bg-red-muted text-primary grid place-items-center flex-shrink-0 mt-0.5 shadow-sm font-bold">-</div>
                            <div>
                                <h4 class="font-bold text-[14px] text-dark mb-1">{{ $service->title }}</h4>
                                <p class="text-[13px] text-gray-body">{!! $service->description !!}</p>
                            </div>
                        </li>
                        @empty
                            <li class="text-gray-body">Services currently being updated.</li>
                        @endforelse
                    </ul>
                    <a href="{{ route('services') }}" class="inline-block bg-primary text-white hover:bg-[#C4182A] px-6 py-3 rounded-md text-[14px] font-medium transition-colors">Explore All Services</a>
                </div>
            </div>
        </section>

        <!-- MOBILE TESTIMONIAL (lg:hidden) -->
        <section class="block lg:hidden bg-[#FAFAFB] py-12 px-4" id="mobileTestimonial">
            <h2 class="font-space font-bold text-[18px] text-dark mb-6">What Our Clients Say</h2>
            @forelse($testimonials->take(1) ?? [] as $testimonial)
            <article class="bg-white p-6 rounded-2xl border border-gray-border shadow-sm">
                <p class="text-[13px] text-dark leading-relaxed mb-6 font-medium">"{!! $testimonial->content !!}"</p>
                <div class="flex items-center gap-3">
                    @if($testimonial->getFirstMediaUrl('default'))
                        <div class="w-10 h-10 rounded-full bg-gray-100 overflow-hidden"><img src="{{ $testimonial->getFirstMediaUrl('default') }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover"></div>
                    @else
                        <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center font-bold text-gray-body text-[12px]">{{ substr($testimonial->client_name, 0, 1) }}</div>
                    @endif
                    <div>
                        <p class="text-[12px] font-bold text-dark">{{ $testimonial->client_name }}</p>
                        <p class="text-[10px] text-gray-body">{{ $testimonial->company_role }}</p>
                    </div>
                </div>
            </article>
            @empty
                <div class="text-center text-gray-body py-4">No testimonials yet.</div>
            @endforelse
        </section>

        <!-- Desktop Testimonials (hidden on mobile) -->
        <section class="hidden lg:block bg-gray-light py-20 border-t border-gray-border" id="desktopTestimonials">
            <div class="max-w-[1280px] mx-auto px-6 md:px-10">
                <div class="text-center mb-12">
                    <h2 class="text-[24px] font-bold text-dark mb-2">Trusted by Industry Leaders</h2>
                    <p class="text-[14px] text-gray-body">Don't just take our word for it. Here's what our clients have to say.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    @forelse($testimonials->take(3) ?? [] as $testimonial)
                    <article class="bg-white p-8 rounded-lg border border-gray-border box-shadow">
                        <p class="text-[14px] text-gray-body leading-[24px] mb-6">"{!! $testimonial->content !!}"</p>
                        <div class="flex items-center gap-3">
                            @if($testimonial->getFirstMediaUrl('default'))
                                <div class="w-10 h-10 rounded-full bg-gray-100 overflow-hidden"><img src="{{ $testimonial->getFirstMediaUrl('default') }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover"></div>
                            @else
                                <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-[14px]">{{ substr($testimonial->client_name, 0, 1) }}</div>
                            @endif
                            <div>
                                <p class="font-bold text-[13px] text-dark">{{ $testimonial->client_name }}</p>
                                <p class="text-[12px] text-gray-body">{{ $testimonial->company_role }}</p>
                            </div>
                        </div>
                    </article>
                    @empty
                        <div class="col-span-full text-center text-gray-body py-4">No testimonials yet.</div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>

    <!-- Large CTA -->
    <section class="bg-primary text-white py-24 text-center px-6">
        <h2 class="text-[32px] md:text-[40px] font-bold mb-4 tracking-tight">{{ $contentBlocks['home_cta_title']->content ?? 'Ready to Upgrade Your Infrastructure?' }}</h2>
        <p class="text-[16px] text-white/90 max-w-2xl mx-auto mb-10 leading-relaxed">{{ $contentBlocks['home_cta_desc']->content ?? 'Get in touch with our specialists today for a customized quote and discover how ATS can accelerate your digital transformation.' }}</p>
        <div class="flex justify-center gap-4">
            <a href="{{ route('contact') }}"
                class="bg-white text-dark hover:bg-gray-50 px-8 py-3.5 rounded text-[14px] font-medium transition-colors">Contact
                Sales Team</a>
            <a href="{{ route('catalog') }}"
                class="bg-transparent border-2 border-white hover:bg-white/10 px-8 py-3.5 rounded text-[14px] font-medium transition-colors">Browse
                Catalog</a>
        </div>
    </section>
@endsection
