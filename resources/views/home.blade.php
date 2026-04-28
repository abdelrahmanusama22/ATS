@extends('layouts.app')

@section('title', 'ATS - Enterprise IT Infrastructure')

@section('content')
    <!-- Hero Section -->
    <section
        class="hidden lg:grid max-w-[1280px] mx-auto px-6 md:px-10 py-16 md:py-24 grid lg:grid-cols-[1.2fr_1fr] gap-12 items-center relative">
        <div
            class="bg-[radial-gradient(circle_at_20%_50%,_rgba(226,29,46,0.04)_0%,_rgba(255,255,255,0)_60%)] absolute inset-0 -z-10 hidden lg:block pointer-events-none">
        </div>
        <div>
            <h1 class="text-[48px] md:text-[64px] font-bold leading-[1.05] tracking-tight mb-6">
                Enterprise-<br>Grade <br>
                <span class="text-primary">IT<br>Infrastructure</span>
            </h1>
            <p class="text-gray-body text-[16px] leading-[1.6] mb-10 max-w-[460px]">Empower your business with
                cutting-edge networking, secure storage, and scalable computing solutions. ATS delivers the technology
                you need to succeed.</p>

            <div class="flex flex-wrap items-center gap-4 mb-10">
                <a href="{{ route('catalog') }}"
                    class="bg-primary text-white hover:bg-[#C4182A] px-7 py-3 rounded-md text-[14px] font-medium transition-colors flex items-center gap-2">Shop
                    Solutions Now <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2">
                        <path d="M5 12h14M12 5l7 7-7 7" />
                    </svg></a>
                <a href="{{ route('contact') }}"
                    class="bg-white text-dark hover:bg-gray-50 border border-gray-border px-7 py-3 rounded-md text-[14px] font-medium transition-colors">Request
                    a Consultation</a>
            </div>

            <div class="flex items-center gap-6 text-[12px] text-gray-body font-medium">
                <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="#E21D2E" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m9 12 2 2 4-4" />
                    </svg> Next-Day Delivery</span>
                <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="#E21D2E" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m9 12 2 2 4-4" />
                    </svg> 24/7 Support</span>
                <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="#E21D2E" stroke-width="2">
                        <circle cx="12" cy="12" r="10" />
                        <path d="m9 12 2 2 4-4" />
                    </svg> Official Warranty</span>
            </div>
        </div>

        <div class="relative w-full aspect-[4/3] lg:aspect-[5/4] rtl-flip hover-lift">
            <div class="w-full h-full rounded-[24px] overflow-hidden bg-gray-200">
                <img src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Enterprise Servers"
                    class="w-full h-full object-cover">
            </div>

            <!-- Price Badge overlapping -->
            <div
                class="absolute -bottom-6 -left-6 bg-white rounded-xl border border-gray-border p-4 pr-8 shadow-xl flex items-center gap-4 hover-lift">
                <div class="w-10 h-10 bg-red-muted rounded-xl grid place-items-center text-primary shrink-0">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <line x1="8" y1="21" x2="16" y2="21" />
                        <line x1="12" y1="17" x2="12" y2="21" />
                    </svg>
                </div>
                <div>
                    <p class="text-[10px] text-gray-body uppercase tracking-wider font-semibold mb-0.5">STARTING AT</p>
                    <p class="font-bold text-[18px] text-dark">25,000 <span
                            class="text-[12px] text-gray-body font-normal">EGP</span></p>
                </div>
            </div>
        </div>
    </section>

    <!-- MOBILE HERO (lg:hidden) -->
    <section class="block lg:hidden relative h-[320px] w-full overflow-hidden">
        <img src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Hero Mobile"
            class="absolute inset-0 w-full h-full object-cover">
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent flex flex-col justify-end p-6 pb-12">
            <div
                class="bg-primary backdrop-blur-sm self-start min-h-[24px] px-3 py-1 rounded-full mb-3 shadow-lg flex items-center justify-center">
                <span class="text-white text-[11px] font-bold uppercase tracking-wider">Enterprise Grade</span>
            </div>
            <h2 class="text-white font-space font-bold text-[30px] leading-tight mb-3">Next-Gen IT<br>Infrastructure
            </h2>
            <p class="text-gray-200 text-[14px] leading-tight mb-6 max-w-[320px]">Scalable networking, security, and
                computing solutions tailored for modern business demands.</p>
            <a href="{{ route('catalog') }}"
                class="bg-primary text-white text-[16px] font-bold py-3.5 rounded-[10px] text-center w-full shadow-xl active:scale-95 transition-all">Shop
                Hardware Catalog</a>
        </div>
    </section>

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
            <!-- Card 1 -->
            <div class="bg-white border border-gray-border rounded-xl p-3 shadow-sm flex flex-col">
                <div class="relative bg-white aspect-square mb-3">
                    <span
                        class="absolute top-0 left-0 bg-primary/10 text-primary text-[9px] font-bold px-1.5 py-0.5 rounded">4.8
                        ★</span>
                    <img src="{{ asset('assets/images/downloaded/photo_1544197150_b99a580bb7a8.jpg') }}" alt="Switch"
                        class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-[13px] text-dark line-clamp-1 mb-2">Cisco Catalyst 9300</h3>
                <div class="flex items-center justify-between mt-auto">
                    <span class="text-primary font-bold text-[14px]">45,000<span
                            class="text-[10px] ml-0.5">EGP</span></span>
                    <button class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center text-white"><svg
                            width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path d="M12 5v14M5 12h14" />
                        </svg></button>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white border border-gray-border rounded-xl p-3 shadow-sm flex flex-col">
                <div class="relative bg-white aspect-square mb-3">
                    <span
                        class="absolute top-0 left-0 bg-primary/10 text-primary text-[9px] font-bold px-1.5 py-0.5 rounded">4.9
                        ★</span>
                    <img src="{{ asset('assets/images/downloaded/photo_1591799264318_7e6ef8ddb7ea.jpg') }}" alt="Server"
                        class="w-full h-full object-contain">
                </div>
                <h3 class="font-bold text-[13px] text-dark line-clamp-1 mb-2">Dell PowerEdge R740</h3>
                <div class="flex items-center justify-between mt-auto">
                    <span class="text-primary font-bold text-[14px]">120,000<span
                            class="text-[10px] ml-0.5">EGP</span></span>
                    <button class="w-8 h-8 bg-primary rounded-lg flex items-center justify-center text-white"><svg
                            width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5">
                            <path d="M12 5v14M5 12h14" />
                        </svg></button>
                </div>
            </div>
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
            <!-- Product 1 -->
            <div data-href="{{ route('product') }}"
                class="bg-white border border-gray-border rounded-lg overflow-hidden flex flex-col hover-lift group relative cursor-pointer product-card">
                <div class="relative bg-gray-light aspect-square p-6 flex items-center justify-center">
                    <span
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded animate-soft-pulse z-10">Hot</span>
                    <img src="{{ asset('assets/images/downloaded/photo_1544197150_b99a580bb7a8.jpg') }}" alt="Switch"
                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-[12px] text-gray-body mb-1">Networking</p>
                    <h3 class="font-semibold text-[14px] text-dark leading-snug mb-4">Cisco Catalyst 9300 Switch</h3>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="font-bold text-[16px]">45,000<span
                                class="text-[12px] text-gray-body font-normal">EGP</span></span>
                        <button
                            class="w-9 h-9 rounded-lg bg-gray-light border border-gray-border flex items-center justify-center flex items-center justify-center hover:bg-primary hover:border-primary hover:text-white transition-colors add-to-cart-btn"
                            data-id="10" data-name="Cisco Catalyst 9300 Switch" data-price="45000"
                            data-image="{{ asset('assets/images/downloaded/photo_1544197150_b99a580bb7a8.jpg') }}"><svg width="16"
                                height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1" />
                                <circle cx="20" cy="21" r="1" />
                                <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6" />
                            </svg></button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div data-href="{{ route('product') }}"
                class="bg-white border border-gray-border rounded-lg overflow-hidden flex flex-col hover-lift group relative cursor-pointer product-card">
                <div class="relative bg-gray-light aspect-square p-6 flex items-center justify-center">
                    <span
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded z-10">Hot</span>
                    <img src="{{ asset('assets/images/downloaded/photo_1591799264318_7e6ef8ddb7ea.jpg') }}" alt="Server"
                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-[12px] text-gray-body mb-1">Servers</p>
                    <h3 class="font-semibold text-[14px] text-dark leading-snug mb-4">Dell PowerEdge R740 Server</h3>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="font-bold text-[16px]">120,000<span
                                class="text-[12px] text-gray-body font-normal">EGP</span></span>
                        <button
                            class="w-9 h-9 rounded-lg bg-gray-light border border-gray-border flex items-center justify-center flex items-center justify-center hover:bg-primary hover:border-primary hover:text-white transition-colors add-to-cart-btn"
                            data-id="11" data-name="Dell PowerEdge R740 Server" data-price="120000"
                            data-image="{{ asset('assets/images/downloaded/photo_1591799264318_7e6ef8ddb7ea.jpg') }}"><svg width="16"
                                height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1" />
                                <circle cx="20" cy="21" r="1" />
                                <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6" />
                            </svg></button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div data-href="{{ url('product') }}"
                class="bg-white border border-gray-border rounded-lg overflow-hidden flex flex-col hover-lift group relative cursor-pointer product-card">
                <div class="relative bg-gray-light aspect-square p-6 flex items-center justify-center">
                    <span
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded z-10">Hot</span>
                    <img src="{{ asset('assets/images/downloaded/photo_1628102491629_778571d893a3.jpg') }}" alt="NAS"
                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-[12px] text-gray-body mb-1">Storage</p>
                    <h3 class="font-semibold text-[14px] text-dark leading-snug mb-4">Synology RackStation RS1221+</h3>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="font-bold text-[16px]">38,500<span
                                class="text-[12px] text-gray-body font-normal">EGP</span></span>
                        <button
                            class="w-9 h-9 rounded-lg bg-gray-light border border-gray-border flex items-center justify-center flex items-center justify-center hover:bg-primary hover:border-primary hover:text-white transition-colors add-to-cart-btn"
                            data-id="12" data-name="Synology RackStation RS1221+" data-price="38500"
                            data-image="{{ asset('assets/images/downloaded/photo_1628102491629_778571d893a3.jpg') }}"><svg width="16"
                                height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1" />
                                <circle cx="20" cy="21" r="1" />
                                <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6" />
                            </svg></button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div data-href="{{ url('product') }}"
                class="bg-white border border-gray-border rounded-lg overflow-hidden flex flex-col hover-lift group relative cursor-pointer product-card">
                <div class="relative bg-gray-light aspect-square p-6 flex items-center justify-center">
                    <span
                        class="absolute top-4 left-4 bg-primary text-white text-[10px] font-bold uppercase tracking-wider px-2 py-0.5 rounded z-10">Hot</span>
                    <img src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Access Point"
                        class="w-full h-full object-contain group-hover:scale-105 transition-transform duration-300">
                </div>
                <div class="p-5 flex flex-col flex-1">
                    <p class="text-[12px] text-gray-body mb-1">Networking</p>
                    <h3 class="font-semibold text-[14px] text-dark leading-snug mb-4">Ubiquiti UniFi Pro Access Point
                    </h3>
                    <div class="mt-auto flex items-center justify-between">
                        <span class="font-bold text-[16px]">6,200<span
                                class="text-[12px] text-gray-body font-normal">EGP</span></span>
                        <button
                            class="w-9 h-9 rounded-lg bg-gray-light border border-gray-border flex items-center justify-center flex items-center justify-center hover:bg-primary hover:border-primary hover:text-white transition-colors add-to-cart-btn"
                            data-id="13" data-name="Ubiquiti UniFi Pro Access Point" data-price="6200"
                            data-image="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}"><svg width="16"
                                height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="9" cy="21" r="1" />
                                <circle cx="20" cy="21" r="1" />
                                <path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6" />
                            </svg></button>
                    </div>
                </div>
            </div>
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
                <a href="{{ route('services') }}" class="flex items-center gap-4 bg-white border border-gray-border p-4 rounded-xl shadow-sm active:bg-gray-50 transition-colors">
                    <div class="w-12 h-12 bg-red-muted rounded-xl grid place-items-center text-primary shrink-0 font-bold">01</div>
                    <div class="flex-1 min-w-0 pr-4">
                        <h4 class="font-bold text-[14px] text-dark">Network Design</h4>
                        <p class="text-[11px] text-gray-body">Custom architectures for your facility.</p>
                    </div>
                    <span class="text-[#DEE1E6] text-[18px] leading-none" aria-hidden="true">&rsaquo;</span>
                </a>
                <a href="{{ url('services') }}" class="flex items-center gap-4 bg-white border border-gray-border p-4 rounded-xl shadow-sm active:bg-gray-50 transition-colors">
                    <div class="w-12 h-12 bg-red-muted rounded-xl grid place-items-center text-primary shrink-0 font-bold">02</div>
                    <div class="flex-1 min-w-0 pr-4">
                        <h4 class="font-bold text-[14px] text-dark">Managed IT Support</h4>
                        <p class="text-[11px] text-gray-body">24/7 technical assistance.</p>
                    </div>
                    <span class="text-[#DEE1E6] text-[18px] leading-none" aria-hidden="true">&rsaquo;</span>
                </a>
            </div>
        </section>

        <!-- Desktop Services (hidden on mobile) -->
        <section class="hidden lg:block max-w-[1280px] mx-auto px-6 md:px-10 py-24" id="desktopServices">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="rounded-2xl overflow-hidden aspect-[4/3] bg-gray-200 order-2 lg:order-1 hover-lift">
                    <img src="{{ asset('assets/images/downloaded/photo_1573164713988_8665fc963095.jpg') }}" alt="Professional Services" class="w-full h-full object-cover">
                </div>
                <div class="order-1 lg:order-2">
                    <span class="text-[12px] bg-red-muted text-primary font-bold px-3 py-1 rounded inline-block mb-4">Professional Services</span>
                    <h2 class="text-[32px] md:text-[40px] font-bold text-dark leading-tight mb-4">Beyond Hardware.<br>We Deliver <span class="text-primary">Solutions.</span></h2>
                    <p class="text-[15px] text-gray-body leading-relaxed mb-8 max-w-[500px]">ATS provides comprehensive IT services to ensure your infrastructure operates at peak performance, securely and efficiently.</p>
                    <ul class="space-y-4 mb-8">
                        <li class="flex gap-4">
                            <div class="w-6 h-6 rounded-xl bg-red-muted text-primary grid place-items-center flex-shrink-0 mt-0.5 shadow-sm font-bold">-</div>
                            <div>
                                <h4 class="font-bold text-[14px] text-dark mb-1">Network Design and Installation</h4>
                                <p class="text-[13px] text-gray-body">Custom architectures tailored to your facility.</p>
                            </div>
                        </li>
                        <li class="flex gap-4">
                            <div class="w-6 h-6 rounded-xl bg-red-muted text-primary grid place-items-center flex-shrink-0 mt-0.5 shadow-sm font-bold">-</div>
                            <div>
                                <h4 class="font-bold text-[14px] text-dark mb-1">Proactive Monitoring and Support</h4>
                                <p class="text-[13px] text-gray-body">Continuous system health checks and rapid response.</p>
                            </div>
                        </li>
                    </ul>
                    <a href="{{ route('services') }}" class="inline-block bg-primary text-white hover:bg-[#C4182A] px-6 py-3 rounded-md text-[14px] font-medium transition-colors">Explore All Services</a>
                </div>
            </div>
        </section>

        <!-- MOBILE TESTIMONIAL (lg:hidden) -->
        <section class="block lg:hidden bg-[#FAFAFB] py-12 px-4" id="mobileTestimonial">
            <h2 class="font-space font-bold text-[18px] text-dark mb-6">What Our Clients Say</h2>
            <article class="bg-white p-6 rounded-2xl border border-gray-border shadow-sm">
                <p class="text-[13px] text-dark leading-relaxed mb-6 font-medium">"ATS completely transformed our data center. Their networking solutions increased our throughput by 40%."</p>
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center font-bold text-gray-body text-[12px]">A</div>
                    <div>
                        <p class="text-[12px] font-bold text-dark">Ahmed Hassan</p>
                        <p class="text-[10px] text-gray-body">CTO, TechCorp Egypt</p>
                    </div>
                </div>
            </article>
        </section>

        <!-- Desktop Testimonials (hidden on mobile) -->
        <section class="hidden lg:block bg-gray-light py-20 border-t border-gray-border" id="desktopTestimonials">
            <div class="max-w-[1280px] mx-auto px-6 md:px-10">
                <div class="text-center mb-12">
                    <h2 class="text-[24px] font-bold text-dark mb-2">Trusted by Industry Leaders</h2>
                    <p class="text-[14px] text-gray-body">Don't just take our word for it. Here's what our clients have to say.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <article class="bg-white p-8 rounded-lg border border-gray-border box-shadow">
                        <p class="text-[14px] text-gray-body leading-[24px] mb-6">"ATS transformed our entire network infrastructure in under two weeks. Their expertise and professionalism exceeded every expectation."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary/10 text-primary flex items-center justify-center font-bold text-[14px]">AH</div>
                            <div>
                                <p class="font-bold text-[13px] text-dark">Ahmed Hassan</p>
                                <p class="text-[12px] text-gray-body">CTO, Pharma Group Egypt</p>
                            </div>
                        </div>
                    </article>
                    <article class="bg-white p-8 rounded-lg border border-gray-border box-shadow">
                        <p class="text-[14px] text-gray-body leading-[24px] mb-6">"The security solutions provided by ATS are world-class. Their CCTV and access control systems have given us complete peace of mind."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-[14px]">SM</div>
                            <div>
                                <p class="font-bold text-[13px] text-dark">Sara Mostafa</p>
                                <p class="text-[12px] text-gray-body">IT Director, Delta Industries</p>
                            </div>
                        </div>
                    </article>
                    <article class="bg-white p-8 rounded-lg border border-gray-border box-shadow">
                        <p class="text-[14px] text-gray-body leading-[24px] mb-6">"We've been working with ATS for over three years. Their managed IT support has reduced our downtime by 90%. A truly essential partner."</p>
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold text-[14px]">KE</div>
                            <div>
                                <p class="font-bold text-[13px] text-dark">Khaled El-Sayed</p>
                                <p class="text-[12px] text-gray-body">Operations Manager, MedTech Solutions</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </section>
    </div>

    <!-- Large CTA -->
    <section class="bg-primary text-white py-24 text-center px-6">
        <h2 class="text-[32px] md:text-[40px] font-bold mb-4 tracking-tight">Ready to Upgrade Your Infrastructure?</h2>
        <p class="text-[16px] text-white/90 max-w-2xl mx-auto mb-10 leading-relaxed">Get in touch with our specialists
            today for a customized quote and discover how ATS can accelerate your digital transformation.</p>
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
