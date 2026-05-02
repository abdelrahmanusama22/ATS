@extends('layouts.app')

@section('title', 'Solutions - ATS')

@section('content')
    <main class="w-full overflow-x-hidden">
        
        <!-- Hero Section -->
        <section class="max-w-[1440px] mx-auto px-6 md:px-[64px] lg:px-[96px] py-16 md:py-24 grid lg:grid-cols-2 gap-12 items-center relative z-10">
            <!-- Left Text -->
            <div class="relative z-10 max-w-[610px]">
                <div class="inline-flex h-[34px] px-4 items-center bg-blue-light rounded-full text-dark font-medium text-[14px] mb-8">
                    Enterprise IT Solutions
                </div>
                
                <h1 class="font-space font-bold text-[48px] md:text-[72px] leading-[1.1] md:leading-[94px] tracking-[-1.8px] text-dark mb-6">
                    {!! $contentBlocks['solutions_hero_title']->content ?? 'Build a robust <br><span class="text-primary">digital foundation.</span>' !!}
                </h1>
                
                <p class="text-[18px] md:text-[20px] text-gray-body leading-[33px] font-space mb-10 max-w-[610px]">
                    {{ $contentBlocks['solutions_hero_desc']->content ?? 'ATS provides end-to-end technology infrastructure solutions designed to scale with your business. From secure networks to smart environments, we engineer reliability.' }}
                </p>
                
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('contact', ['subject' => 'Consultation']) }}" class="h-[56px] px-8 bg-primary text-white rounded-md flex items-center justify-center font-medium text-[16px] hover:bg-[#C4182A] transition-colors">
                        Request Consultation
                    </a>
                    <a href="{{ route('catalog') }}" class="h-[56px] px-8 bg-gray-light border border-gray-border text-dark rounded-md flex items-center justify-center font-medium text-[16px] hover:bg-gray-100 transition-colors">
                        Explore Hardware Catalog
                    </a>
                </div>
            </div>

            <!-- Right Visual & Stats -->
            <div class="relative w-full max-w-[624px] ml-auto mt-12 lg:mt-0">
                <!-- Aesthetic Blur Behind Image -->
                <div class="absolute inset-0 bg-red-muted/30 blur-[64px] rounded-full transform scale-110 z-0 hidden lg:block"></div>
                
                <!-- Main Image -->
                <div class="relative z-10 aspect-square border border-gray-border/50 rounded-[16px] overflow-hidden shadow-2xl bg-white">
                    <img src="{{ isset($contentBlocks['solutions_hero_image']) && $contentBlocks['solutions_hero_image']->hasMedia('default') ? $contentBlocks['solutions_hero_image']->getFirstMediaUrl('default') : asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Server Data Center" class="w-full h-full object-cover">
                </div>

                <!-- Floating Stats Bar -->
                <div class="absolute -bottom-10 left-12 right-12 z-20 bg-white/90 backdrop-blur-md rounded-[10px] shadow-lg border border-gray-border/50 p-6 flex flex-wrap justify-between items-center gap-4">
                    <div>
                        <div class="text-[14px] font-medium text-gray-body mb-1">System Uptime</div>
                        <div class="font-space font-bold text-[30px] leading-[36px] text-dark">99.99%</div>
                    </div>
                    <div class="w-[1px] h-[48px] bg-gray-border hidden sm:block"></div>
                    <div>
                        <div class="text-[14px] font-medium text-gray-body mb-1">Threats Blocked</div>
                        <div class="font-space font-bold text-[30px] leading-[36px] text-dark">2.4M+</div>
                    </div>
                    <div class="w-[1px] h-[48px] bg-gray-border hidden sm:block"></div>
                    <div>
                        <div class="text-[14px] font-medium text-gray-body mb-1">Active Nodes</div>
                        <div class="font-space font-bold text-[30px] leading-[36px] text-blue-primary">1,204</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Core Capability Areas -->
        <section class="bg-gray-light py-24 px-6 md:px-[64px] lg:px-[96px]">
            <div class="max-w-[1440px] mx-auto">
                <div class="text-center mb-16">
                    <h2 class="font-space font-bold text-[36px] leading-[40px] text-dark mb-4">{{ $contentBlocks['solutions_capabilities_title']->content ?? 'Core Capability Areas' }}</h2>
                    <p class="text-[18px] text-gray-body leading-[28px] max-w-[703px] mx-auto">
                        {{ $contentBlocks['solutions_capabilities_desc']->content ?? 'We deliver tailored solutions across four primary domains, ensuring your organization is secure, connected, and optimized for the future.' }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    @forelse($services->take(4) ?? [] as $service)
                    <div class="bg-white rounded-[10px] p-6 flex flex-col box-shadow custom-hover-lift hover:shadow-lg transition-shadow border border-gray-border/30">
                        <div class="w-[56px] h-[56px] bg-red-muted rounded-xl flex items-center justify-center mb-6 shrink-0 text-primary">
                            @if($service->getFirstMediaUrl('default'))
                                <img src="{{ $service->getFirstMediaUrl('default') }}" alt="{{ $service->title }}" class="w-full h-full object-cover rounded-xl">
                            @else
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
                            @endif
                        </div>
<<<<<<< Updated upstream
                        <h3 class="font-space font-medium text-[20px] tracking-[-0.5px] text-dark mb-3">{{ $service->title }}</h3>
                        <div class="text-[16px] text-gray-body leading-[26px] mb-6 flex-1 line-clamp-3">
                            {!! strip_tags($service->description) !!}
                        </div>
                        <a href="{{ route('contact') }}" class="inline-flex items-center text-[14px] font-medium text-primary hover:text-[#C4182A] group mt-auto">
                            {{ __('Explore Solution') }}
=======
                        <h3 class="font-space font-medium text-[20px] tracking-[-0.5px] text-dark mb-3">CCTV & Surveillance</h3>
                        <p class="text-[16px] text-gray-body leading-[26px] mb-6 flex-1">
                            High-definition, IP-based physical security systems with intelligent AI analytics and remote monitoring capabilities.
                        </p>
                        <a href="{{ route('contact', ['subject' => 'Consultation']) }}" class="inline-flex items-center text-[14px] font-medium text-primary hover:text-[#C4182A] group">
                            Explore Solution
>>>>>>> Stashed changes
                            <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                    @empty
                        <div class="col-span-full border border-dashed border-gray-border rounded-[10px] p-12 text-center text-gray-body">
                            We are updating our capabilities. Check back soon.
                        </div>
<<<<<<< Updated upstream
                    @endforelse
=======
                        <h3 class="font-space font-medium text-[20px] tracking-[-0.5px] text-dark mb-3">Enterprise Networking</h3>
                        <p class="text-[16px] text-gray-body leading-[26px] mb-6 flex-1">
                            Robust routing, switching, and wireless architectures designed for high availability and minimal latency.
                        </p>
                        <a href="{{ route('contact', ['subject' => 'Consultation']) }}" class="inline-flex items-center text-[14px] font-medium text-primary hover:text-[#C4182A] group">
                            Explore Solution
                            <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>

                    <!-- Smart Office -->
                    <div class="bg-white rounded-[10px] p-6 flex flex-col box-shadow custom-hover-lift hover:shadow-lg transition-shadow border border-gray-border/30">
                        <div class="w-[56px] h-[56px] bg-gray-50 rounded-xl flex items-center justify-center border border-gray-border mb-6 shrink-0">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#171A1F" stroke-width="1.5"><path d="M4 22V8a2 2 0 0 1 2-2h4"/><path d="M10 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18"/><path d="M2 22h20"/><path d="M14 6h4"/><path d="M14 10h4"/><path d="M14 14h4"/><path d="M14 18h4"/></svg>
                        </div>
                        <h3 class="font-space font-medium text-[20px] tracking-[-0.5px] text-dark mb-3">Smart Office Automation</h3>
                        <p class="text-[16px] text-gray-body leading-[26px] mb-6 flex-1">
                            Integrated environmental controls, access management, and automated presentation systems for modern workspaces.
                        </p>
                        <a href="{{ route('contact', ['subject' => 'Consultation']) }}" class="inline-flex items-center text-[14px] font-medium text-primary hover:text-[#C4182A] group">
                            Explore Solution
                            <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>

                    <!-- Cybersecurity -->
                    <div class="bg-white rounded-[10px] p-6 flex flex-col box-shadow custom-hover-lift hover:shadow-lg transition-shadow border border-gray-border/30">
                        <div class="w-[56px] h-[56px] bg-gray-50 rounded-xl flex items-center justify-center border border-gray-border mb-6 shrink-0">
                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="#171A1F" stroke-width="1.5"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                        <h3 class="font-space font-medium text-[20px] tracking-[-0.5px] text-dark mb-3">Cybersecurity Infrastructure</h3>
                        <p class="text-[16px] text-gray-body leading-[26px] mb-6 flex-1">
                            Next-generation firewalls, zero-trust network access, and endpoint protection to secure your critical data.
                        </p>
                        <a href="{{ route('contact', ['subject' => 'Consultation']) }}" class="inline-flex items-center text-[14px] font-medium text-primary hover:text-[#C4182A] group">
                            Explore Solution
                            <svg class="ml-1 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </a>
                    </div>
>>>>>>> Stashed changes
                </div>
            </div>
        </section>

        <!-- Solution Blueprint Section -->
        <section class="max-w-[1440px] mx-auto px-6 md:px-[64px] lg:px-[96px] py-24 bg-white">
            
            <!-- Header Row -->
            <div class="border-b border-gray-border pb-12 mb-12 flex flex-col md:flex-row md:justify-between md:items-center gap-8">
                <div class="max-w-[760px]">
                    <div class="inline-flex h-[22px] px-3 items-center border border-blue-primary/30 rounded-full text-blue-primary font-medium text-[12px] mb-4">
                        {{ $contentBlocks['solutions_blueprint_subtitle']->content ?? 'Solution Blueprint' }}
                    </div>
                    <h2 class="font-space font-bold text-[36px] md:text-[48px] leading-[1] text-dark mb-6">{{ $contentBlocks['solutions_blueprint_title']->content ?? 'Enterprise Network Architecture' }}</h2>
                    <p class="font-space text-[18px] md:text-[20px] leading-[28px] text-gray-body">
                        {{ $contentBlocks['solutions_blueprint_desc']->content ?? 'A comprehensive approach to building a resilient, high-capacity corporate network capable of supporting demanding modern workloads and distributed teams.' }}
                    </p>
                </div>
                <div class="shrink-0">
                    <a href="{{ route('contact', ['subject' => 'Consultation']) }}" class="inline-flex h-[44px] px-6 bg-primary text-white rounded-md items-center justify-center font-medium text-[14px] hover:bg-[#C4182A] transition-colors">
                        Consult an Architect
                    </a>
                </div>
            </div>

            <!-- Content Split Grid -->
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-8 items-start">
                
                <!-- Left Main Block -->
                <div class="lg:col-span-8 flex flex-col">
                    
                    <!-- Network Diagram Image -->
                    <div class="w-full bg-gray-light rounded-[16px] overflow-hidden mb-12">
                        <!-- Network visual placeholder -->
                        <div class="w-full h-[400px] bg-dark relative flex items-center justify-center overflow-hidden">
                            <svg class="absolute inset-0 w-full h-full opacity-30" viewBox="0 0 854 400" preserveAspectRatio="none">
                                <path stroke="#365EE2" stroke-width="2" fill="none" d="M100 200 L300 100 L500 250 L750 150"/>
                                <path stroke="#E21D2E" stroke-width="2" fill="none" d="M200 300 L400 200 L600 300"/>
                            </svg>
                            <!-- Simulating the nodes -->
                            <div class="grid grid-cols-4 gap-12 scale-150 opacity-40">
                                <div class="w-12 h-8 bg-blue-primary/50 rounded-sm"></div>
                                <div class="w-12 h-8 bg-blue-primary/50 rounded-sm translate-y-12"></div>
                                <div class="w-12 h-8 bg-blue-primary/50 rounded-sm -translate-y-8"></div>
                                <div class="w-12 h-8 bg-blue-primary/50 rounded-sm translate-y-4"></div>
                                <div class="w-12 h-8 bg-blue-primary/50 rounded-sm translate-y-8"></div>
                                <div class="w-12 h-8 bg-blue-primary/50 rounded-sm -translate-y-12 shrink-0 border border-white"></div>
                            </div>
                            <div class="absolute inset-0 overflow-hidden z-0">
                                <img src="{{ isset($contentBlocks['solutions_bg_image']) && $contentBlocks['solutions_bg_image']->hasMedia('default') ? $contentBlocks['solutions_bg_image']->getFirstMediaUrl('default') : asset('assets/images/downloaded/photo_1451187580459_43490279c0fa.jpg') }}" alt="Network Nodes Background" class="absolute inset-0 w-full h-full object-cover mix-blend-overlay opacity-50">
                            </div>
                        </div>
                    </div>

                    <!-- Features Grids -->
                    <div class="mb-12">
                        <h3 class="font-space font-bold text-[24px] text-dark mb-8">Core Components & Capabilities</h3>
                        
                        <div class="grid md:grid-cols-2 gap-y-10 gap-x-12">
                            <!-- HA -->
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                                    <h4 class="font-space font-bold text-[18px] text-dark">High Availability (HA)</h4>
                                </div>
                                <p class="text-[14px] text-gray-body leading-[20px] pl-9">
                                    Redundant pathways and automatic failover mechanisms ensure your business remains operational even during hardware faults.
                                </p>
                            </div>
                            
                            <!-- Zero Trust -->
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    <h4 class="font-space font-bold text-[18px] text-dark">Zero Trust Segmentation</h4>
                                </div>
                                <p class="text-[14px] text-gray-body leading-[20px] pl-9">
                                    Micro-segmentation of internal traffic prevents lateral movement of threats, securing sensitive data enclaves.
                                </p>
                            </div>

                            <!-- SD WAN -->
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"/><rect x="2" y="14" width="20" height="8" rx="2" ry="2"/><line x1="6" y1="6" x2="6.01" y2="6"/><line x1="6" y1="18" x2="6.01" y2="18"/></svg>
                                    <h4 class="font-space font-bold text-[18px] text-dark">Software-Defined WAN (SD-WAN)</h4>
                                </div>
                                <p class="text-[14px] text-gray-body leading-[20px] pl-9">
                                    Intelligent routing across multiple transport types to optimize application performance for branch offices.
                                </p>
                            </div>

                            <!-- High Density -->
                            <div>
                                <div class="flex items-center gap-3 mb-2">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12.55a11 11 0 0 1 14.08 0"/><path d="M1.42 9a16 16 0 0 1 21.16 0"/><path d="M8.53 16.11a6 6 0 0 1 6.95 0"/><line x1="12" y1="20" x2="12.01" y2="20"/></svg>
                                    <h4 class="font-space font-bold text-[18px] text-dark">High-Density Wireless</h4>
                                </div>
                                <p class="text-[14px] text-gray-body leading-[20px] pl-9">
                                    Wi-Fi 6/6E deployments designed to handle hundreds of concurrent clients in dense office environments.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Expected Outcomes -->
                    <div class="bg-red-muted/30 border border-primary/10 rounded-[16px] p-6 lg:p-8">
                        <div class="flex items-center gap-3 mb-6">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="shrink-0"><circle cx="12" cy="12" r="10" stroke="#E21D2E" stroke-width="2"/><path d="M9 12l2 2 4-4" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                            <h4 class="font-space font-bold text-[20px] text-dark">Expected Outcomes</h4>
                        </div>
                        <ul class="space-y-4 pl-1">
                            <li class="flex items-start gap-4">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2.5 shrink-0"></span>
                                <span class="text-[16px] text-dark leading-[24px]">Reduction in unplanned network downtime by up to 99%.</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2.5 shrink-0"></span>
                                <span class="text-[16px] text-dark leading-[24px]">Simplified management of distributed branch networks through a single pane of glass.</span>
                            </li>
                            <li class="flex items-start gap-4">
                                <span class="w-1.5 h-1.5 bg-primary rounded-full mt-2.5 shrink-0"></span>
                                <span class="text-[16px] text-dark leading-[24px]">Enhanced security posture complying with ISO 27001 and local data protection regulations.</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Right Sidebar Block -->
                <div class="lg:col-span-4 flex flex-col gap-6">
                    
                    <!-- Required Infrastructure Card -->
                    <div class="border border-gray-border rounded-[10px] bg-white overflow-hidden shadow-sm">
                        
                        <!-- Header -->
                        <div class="bg-gray-light border-b border-gray-border px-6 py-5">
                            <h3 class="font-medium text-[18px] tracking-[-0.45px] text-dark mb-1">Required Infrastructure</h3>
                            <p class="text-[14px] text-gray-body">Recommended hardware for this solution architecture.</p>
                        </div>
                        
                        <!-- List -->
                        <div class="flex flex-col">
<<<<<<< Updated upstream
                            @forelse($products ?? [] as $product)
                            <a href="{{ route('product.show', $product->id) }}" class="p-4 flex items-center gap-4 hover:bg-gray-50 transition-colors border-b border-gray-border/50 group">
=======
                            
                            <!-- Item 1 -->
                            <a href="{{ route('contact', ['subject' => 'Quote']) }}" class="p-4 flex items-center gap-4 hover:bg-gray-50 transition-colors border-b border-gray-border/50 group">
                                <!-- Fake Product Image -->
>>>>>>> Stashed changes
                                <div class="w-16 h-16 border border-gray-border rounded bg-white overflow-hidden shrink-0">
                                    <img src="{{ $product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $product->title }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[12px] text-gray-body mb-0.5">{{ $product->category->name ?? 'Hardware' }}</div>
                                    <div class="font-bold text-[14px] text-dark truncate">{{ $product->title }}</div>
                                    <div class="font-medium text-[14px] text-dark mt-0.5">EGP {{ number_format($product->price) }}</div>
                                </div>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#565D6D" stroke-width="2" class="shrink-0 group-hover:stroke-dark transition-colors"><polyline points="9 18 15 12 9 6"/></svg>
                            </a>
<<<<<<< Updated upstream
                            @empty
                                <div class="p-6 text-center text-gray-body text-[13px]">
                                    Recommended infrastructure being updated.
                                </div>
                            @endforelse
=======

                            <!-- Item 2 -->
                            <a href="{{ route('contact', ['subject' => 'Quote']) }}" class="p-4 flex items-center gap-4 hover:bg-gray-50 transition-colors border-b border-gray-border/50 group">
                                <div class="w-16 h-16 border border-gray-border rounded bg-white flex items-center justify-center p-2 shrink-0">
                                    <img src="{{ asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Fortinet Firewall" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[12px] text-gray-body mb-0.5">NGFW Firewall</div>
                                    <div class="font-bold text-[14px] text-dark truncate">Fortinet FortiGate 200F</div>
                                    <div class="font-medium text-[14px] text-dark mt-0.5">EGP 89,900</div>
                                </div>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#565D6D" stroke-width="2" class="shrink-0 group-hover:stroke-dark transition-colors"><polyline points="9 18 15 12 9 6"/></svg>
                            </a>

                            <!-- Item 3 -->
                            <a href="{{ route('contact', ['subject' => 'Quote']) }}" class="p-4 flex items-center gap-4 hover:bg-gray-50 transition-colors border-b border-gray-border group">
                                <div class="w-16 h-16 border border-gray-border rounded bg-white overflow-hidden shrink-0">
                                    <img src="{{ asset('assets/images/downloaded/photo_1524661135_423995f22d0b.jpg') }}" alt="Aruba Access Point" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <div class="text-[12px] text-gray-body mb-0.5">Wireless Infrastructure</div>
                                    <div class="font-bold text-[14px] text-dark truncate">Aruba Wi-Fi 6 Access Point</div>
                                    <div class="font-medium text-[14px] text-dark mt-0.5">EGP 15,200</div>
                                </div>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#565D6D" stroke-width="2" class="shrink-0 group-hover:stroke-dark transition-colors"><polyline points="9 18 15 12 9 6"/></svg>
                            </a>
>>>>>>> Stashed changes
                        </div>
                        
                        <!-- Footer Button -->
                        <div class="p-4 bg-gray-light">
                            <a href="{{ route('catalog') }}" class="w-full h-[40px] flex items-center justify-center bg-white border border-gray-border rounded-md font-medium text-[14px] text-dark hover:bg-gray-50 transition-colors">
                                View Full Catalog
                            </a>
                        </div>
                    </div>

                    <!-- Custom Design Card -->
                    <div class="bg-primary rounded-[10px] text-center p-8 flex flex-col items-center">
                        <div class="w-16 h-16 rounded-xl bg-white/20 flex items-center justify-center mb-6 shrink-0">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        </div>
                        <h3 class="font-space font-bold text-[20px] text-white leading-[28px] mb-3">Need a custom design?</h3>
                        <p class="text-[14px] text-white/80 leading-[20px] mb-8">
                            Our certified engineers are ready to design a network tailored to your specific physical layout and bandwidth needs.
                        </p>
                        <a href="{{ route('contact', ['subject' => 'Consultation']) }}" class="w-full h-[40px] bg-white text-dark rounded-md flex items-center justify-center font-medium text-[14px] hover:bg-gray-100 transition-colors">
                            Contact Engineering
                        </a>
                    </div>
                </div>

            </div>
        </section>

    </main>
@endsection
