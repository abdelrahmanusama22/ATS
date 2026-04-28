@extends('layouts.app')

@section('title', 'Product Details - ATS')

@section('content')
    <div class="max-w-[1280px] mx-auto px-6 py-8">

        <div class="grid lg:grid-cols-2 gap-12 mb-16 items-start">
            <!-- Product Images -->
            <div class="flex flex-col gap-4">
                <div class="bg-gray-200 lg:rounded-[20px] aspect-square lg:aspect-square max-h-[50vh] lg:max-h-none relative flex items-center justify-center overflow-hidden -mx-6 lg:mx-0">
                    <span class="absolute top-6 left-6 bg-[#365EE2] text-white text-[12px] font-bold tracking-wide px-3 py-1 rounded-full z-10 box-shadow">New Arrival</span>
                    <img src="{{ asset('assets/images/downloaded/photo_1557825835_70d97c4aa567.jpg') }}" alt="VisionCam X1" class="w-full h-full object-cover mix-blend-multiply transition-transform duration-500 hover:scale-105 cursor-zoom-in" id="mainProductImage">
                </div>
                
                <div class="flex lg:grid lg:grid-cols-4 gap-3 overflow-x-auto lg:overflow-visible no-scrollbar pb-2 lg:pb-0">
                    <div class="bg-gray-200 rounded-lg aspect-square border-2 border-primary overflow-hidden cursor-pointer product-thumb" data-src="{{ asset('assets/images/downloaded/photo_1557825835_70d97c4aa567.jpg') }}">
                        <img src="{{ asset('assets/images/downloaded/photo_1557825835_70d97c4aa567.jpg') }}" alt="Thumbnail 1" class="w-full h-full object-cover mix-blend-multiply">
                    </div>
                    <div class="bg-[#324564] rounded-lg aspect-square border-2 border-transparent hover:border-gray-border overflow-hidden cursor-pointer product-thumb" data-src="{{ asset('assets/images/downloaded/photo_1581447109200_bf2769116351.jpg') }}">
                        <img src="{{ asset('assets/images/downloaded/photo_1581447109200_bf2769116351.jpg') }}" alt="Thumbnail 2" class="w-full h-full object-cover mix-blend-multiply opacity-50">
                    </div>
                    <div class="bg-[#F2F4FD] rounded-lg aspect-square border-2 border-transparent hover:border-gray-border overflow-hidden cursor-pointer product-thumb" data-src="{{ asset('assets/images/downloaded/photo_1581092160562_40aa08e78837.jpg') }}">
                        <img src="{{ asset('assets/images/downloaded/photo_1581092160562_40aa08e78837.jpg') }}" alt="Thumbnail 3" class="w-full h-full object-cover mix-blend-multiply opacity-50">
                    </div>
                    <div class="bg-gray-200 rounded-lg aspect-square border-2 border-transparent hover:border-gray-border overflow-hidden cursor-pointer product-thumb" data-src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}">
                        <img src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Thumbnail 4" class="w-full h-full object-cover mix-blend-multiply opacity-50">
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div>
                <div class="flex items-center justify-between mb-2">
                    <span class="text-primary font-bold text-[11px] tracking-wider uppercase">ATS SOLUTIONS</span>
                    <div class="flex items-center gap-4 text-[13px] text-gray-body">
                        <button id="shareBtn" class="flex items-center gap-1.5 hover:text-dark">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"/><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"/></svg> Share
                        </button>
                        <span>SKU: ATS-SEC-0992</span>
                    </div>
                </div>

                <h1 class="text-[32px] font-bold text-dark leading-tight mb-4 tracking-tight">ATS VisionCam X1 Smart Security AI</h1>
                
                <div class="flex items-center gap-3 mb-6">
                    <div class="flex gap-1 text-[#F59E0B]">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77V2z"/></svg>
                    </div>
                    <span class="text-[14px] font-bold">4.8</span>
                    <span class="text-[14px] text-gray-body underline hover:text-dark cursor-pointer">(124 Reviews)</span>
                </div>

                <div class="mb-8">
                    <p class="text-[12px] text-gray-body mb-2">Price</p>
                    <div class="flex items-center gap-6">
                        <div class="font-bold text-[36px] text-dark leading-none">3,499 <span class="text-[16px] text-gray-body font-normal ml-1 box-border align-baseline">EGP</span></div>
                        <div class="bg-white border border-[#DEE1E6] rounded-full px-4 py-1.5 flex items-center gap-2 text-[13px] font-medium text-dark">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                            In Stock (Ready to ship)
                        </div>
                    </div>
                </div>

                <div class="border-t border-gray-border py-8 text-[15px] text-[#565D6D] leading-relaxed">
                    <p class="mb-6">Enterprise-grade smart security camera featuring 4K resolution, advanced AI human detection, and seamless integration with existing IT infrastructure. Designed for robust modern office environments.</p>
                    
                    <ul class="space-y-3">
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>4K Ultra HD Resolution at 60fps</li>
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>AI-Powered Person & Vehicle Detection</li>
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>Color Night Vision up to 30 meters</li>
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>PoE (Power over Ethernet) Support</li>
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>IP67 Weatherproof Rating</li>
                    </ul>
                </div>

                <div class="flex border-t border-gray-border py-8 flex-col sm:flex-row gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="product-qty-input" class="text-[12px] text-gray-body">Quantity</label>
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
                            data-id="99"
                            data-name="ATS Secure-Pro 4K Dome Camera" 
                            data-price="12500" 
                            data-image="{{ asset('assets/images/downloaded/photo_1557597774_9d273605dfa9.jpg') }}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="shrink-0"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg> Add to Cart
                        </button>
                        <a href="{{ route('checkout') }}" class="flex-1 bg-dark text-white font-bold text-[15px] rounded border border-transparent hover:bg-black transition-all flex items-center justify-center gap-2 h-12 shadow-sm shrink-0 whitespace-nowrap px-4">
                            Checkout
                        </a>
                        <button id="wishlistBtn" class="w-12 h-12 rounded border border-gray-border bg-white flex items-center justify-center text-gray-body hover:text-primary hover:border-primary transition-all shrink-0 shadow-sm">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                        </button>
                    </div>
                </div>

                <div class="bg-gray-light border border-gray-border rounded-lg p-5 flex flex-wrap gap-x-8 gap-y-4 text-[13px] font-medium text-dark">
                    <div class="flex items-center gap-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><polyline points="9 12 11 14 15 10"/></svg>
                        <span>2 Year Warranty</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2"><rect x="1" y="3" width="15" height="13"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>
                        <span>Free Delivery</span>
                    </div>
                    <div class="flex items-center gap-2.5">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2"><path d="M2.5 2v6h6M2.66 15.57a10 10 0 1 0 .57-8.38l-3.15 3.15"/></svg>
                        <span>14-Day Returns</span>
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
                    <h3 class="text-[20px] font-bold text-dark mb-4">Enterprise-Grade Smart Security</h3>
                    <p class="text-[15px] text-[#565D6D] leading-relaxed mb-6">The ATS VisionCam X1 represents the next generation of intelligent surveillance technology, designed specifically for enterprise IT environments that demand uncompromising security and seamless integration.</p>
                    <p class="text-[15px] text-[#565D6D] leading-relaxed mb-6">Featuring advanced AI-powered detection algorithms, the X1 can distinguish between people, vehicles, and other objects with remarkable accuracy, reducing false alarms by up to 95% compared to traditional motion-detection cameras.</p>
                    <h4 class="text-[16px] font-bold text-dark mb-3">Key Advantages</h4>
                    <ul class="space-y-2 text-[15px] text-[#565D6D]">
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>Seamless integration with existing NVR and VMS systems</li>
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>ONVIF Profile S/T compliant for maximum compatibility</li>
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>Dual-stream encoding for efficient bandwidth usage</li>
                        <li class="flex items-start gap-3"><div class="w-1.5 h-1.5 rounded-full bg-primary mt-2"></div>Built-in tamper detection and auto-recovery</li>
                    </ul>
                </div>
            </div>

            <div class="max-w-[700px] tab-panel tab-panel-active" id="tab-specs">
                <div class="border border-gray-border rounded-xl bg-white overflow-hidden text-[14px]">
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Image Sensor</div>
                        <div class="p-5 text-dark font-medium">1/2.8" Progressive Scan CMOS</div>
                    </div>
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Max. Resolution</div>
                        <div class="p-5 text-dark font-medium">3840 × 2160</div>
                    </div>
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Field of View</div>
                        <div class="p-5 text-dark font-medium">Horizontal: 102°, Vertical: 54°, Diagonal: 121°</div>
                    </div>
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Video Compression</div>
                        <div class="p-5 text-dark font-medium">H.265+/H.265/H.264+/H.264</div>
                    </div>
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Network Interface</div>
                        <div class="p-5 text-dark font-medium">1 RJ45 10 M/100 M self-adaptive Ethernet port</div>
                    </div>
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Power Supply</div>
                        <div class="p-5 text-dark font-medium">12 VDC ± 25%, PoE (802.3af, class 3)</div>
                    </div>
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Operating Conditions</div>
                        <div class="p-5 text-dark font-medium">-30 °C to 60 °C (-22 °F to 140 °F)</div>
                    </div>
                    <div class="grid grid-cols-[1fr_2fr] border-b border-gray-border last:border-0 hover:bg-gray-50 transition-colors">
                        <div class="p-5 font-medium text-gray-body border-r border-gray-border bg-gray-50/50">Dimensions</div>
                        <div class="p-5 text-dark font-medium">Ø 138.3 mm × 125.2 mm (Ø 5.4" × 4.9")</div>
                    </div>
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

        <!-- Frequently Bought Together -->
        <div>
            <div class="flex items-center justify-between mb-8">
                <h2 class="text-[20px] font-bold text-dark">Frequently Bought Together</h2>
                <a href="{{ route('catalog') }}" class="text-[13px] text-primary font-medium flex items-center gap-1 hover:underline">View All Accessories <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m9 18 6-6-6-6"/></svg></a>
            </div>

            <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Accessory 1 -->
                <div class="bg-white border border-gray-border rounded-xl overflow-hidden hover-lift flex flex-col cursor-pointer">
                    <div class="bg-gray-light aspect-square p-4 flex items-center justify-center border-b border-gray-border">
                        <img src="{{ asset('assets/images/downloaded/photo_1544197150_b99a580bb7a8.jpg') }}" alt="NVR" class="w-full h-full object-contain mix-blend-multiply">
                    </div>
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h3 class="font-semibold text-[13px] leading-snug mb-3">ATS Pro NVR 16-Channel</h3>
                        <div class="mt-auto flex items-end justify-between">
                            <span class="font-bold text-[15px] text-primary">8,500 <span class="text-[11px] font-normal">EGP</span></span>
                            <button class="w-8 h-8 rounded border border-gray-border text-gray-body hover:text-primary hover:border-primary transition-colors flex items-center justify-center add-to-cart-btn"
                                data-id="101" 
                                data-name="ATS Pro NVR 16-Channel" 
                                data-price="8500" 
                                data-image="{{ asset('assets/images/downloaded/photo_1544197150_b99a580bb7a8.jpg') }}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Accessory 2 -->
                <div class="bg-white border border-gray-border rounded-xl overflow-hidden hover-lift flex flex-col cursor-pointer">
                    <div class="bg-gray-light aspect-square p-4 flex items-center justify-center border-b border-gray-border">
                        <img src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Cable" class="w-full h-full object-contain mix-blend-multiply">
                    </div>
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h3 class="font-semibold text-[13px] leading-snug mb-3">Cat6a Shielded Ethernet Cable (100m)</h3>
                        <div class="mt-auto flex items-end justify-between">
                            <span class="font-bold text-[15px] text-primary">1,250 <span class="text-[11px] font-normal">EGP</span></span>
                            <button class="w-8 h-8 rounded border border-transparent text-gray-body hover:text-primary transition-colors flex items-center justify-center add-to-cart-btn"
                                data-id="102" 
                                data-name="Cat6a Shielded Ethernet Cable (100m)" 
                                data-price="1250" 
                                data-image="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Accessory 3 -->
                <div class="bg-white border border-gray-border rounded-xl overflow-hidden hover-lift flex flex-col cursor-pointer">
                    <div class="bg-gray-light aspect-square p-4 flex items-center justify-center border-b border-gray-border">
                        <img src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Control Pad" class="w-full h-full object-contain mix-blend-multiply">
                    </div>
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h3 class="font-semibold text-[13px] leading-snug mb-3">Smart Office Access Control Pad</h3>
                        <div class="mt-auto flex items-end justify-between">
                            <span class="font-bold text-[15px] text-primary">2,900 <span class="text-[11px] font-normal">EGP</span></span>
                            <button class="w-8 h-8 rounded border border-transparent text-gray-body hover:text-primary transition-colors flex items-center justify-center add-to-cart-btn"
                                data-id="103" 
                                data-name="Smart Office Access Control Pad" 
                                data-price="2900" 
                                data-image="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Accessory 4 -->
                <div class="bg-white border border-gray-border rounded-xl overflow-hidden hover-lift flex flex-col cursor-pointer">
                    <div class="bg-gray-light aspect-square p-4 flex items-center justify-center border-b border-gray-border">
                        <img src="{{ asset('assets/images/downloaded/photo_1628102491629_778571d893a3.jpg') }}" alt="Switch" class="w-full h-full object-contain mix-blend-multiply">
                    </div>
                    <div class="p-5 flex flex-col flex-1 bg-white">
                        <h3 class="font-semibold text-[13px] leading-snug mb-3">PoE+ Gigabit Switch 8-Port</h3>
                        <div class="mt-auto flex items-end justify-between">
                            <span class="font-bold text-[15px] text-primary">1,850 <span class="text-[11px] font-normal">EGP</span></span>
                            <button class="w-8 h-8 rounded border border-transparent text-gray-body hover:text-primary transition-colors flex items-center justify-center add-to-cart-btn"
                                data-id="104" 
                                data-name="PoE+ Gigabit Switch 8-Port" 
                                data-price="1850" 
                                data-image="{{ asset('assets/images/downloaded/photo_1628102491629_778571d893a3.jpg') }}">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
