@extends('layouts.app')

@section('title', 'Our Services - ATS')

@section('content')
    <main class="max-w-[1440px] mx-auto pb-24 px-6 md:px-[64px] lg:px-[96px]">
        
        <!-- Hero Section -->
        <section class="mt-12 mb-24 relative overflow-hidden bg-blue-primary rounded-[24px] min-h-[490px] flex items-center p-8 md:p-[64px] shadow-lg">
            <!-- Subtle Radial Gradient Background Effect -->
            <div class="absolute inset-0 z-0 bg-[radial-gradient(circle_at_center,rgba(255,255,255,0.15)_0%,transparent_60%)]"></div>
            
            <div class="relative z-10 w-full grid lg:grid-cols-2 gap-12 items-center">
                <!-- Left Content -->
                <div>
                    <div class="inline-flex h-[26px] px-4 items-center border border-white/30 bg-white/10 rounded-full text-white font-medium text-[12px] mb-8">
                        {{ $contentBlocks['services_hero_subtitle']->content ?? 'Enterprise Solutions' }}
                    </div>
                    
                    <h1 class="font-space font-bold text-[40px] md:text-[60px] leading-[1.1] md:leading-[60px] tracking-[-1.5px] text-white max-w-[445px] mb-6">
                        {!! $contentBlocks['services_hero_title']->content ?? 'Transform Your IT Infrastructure.' !!}
                    </h1>
                    
                    <p class="text-[16px] md:text-[20px] text-white/80 leading-[28px] max-w-[499px] mb-10">
                        {{ $contentBlocks['services_hero_desc']->content ?? 'From robust network installations to proactive 24/7 managed support, ATS delivers premium technology services designed to scale your business securely and efficiently.' }}
                    </p>
                    
                    <div class="flex flex-wrap items-center gap-4">
                        <a href="{{ route('contact') }}" class="h-[44px] px-8 bg-primary border-transparent border text-white rounded-md flex items-center justify-center font-medium text-[14px] hover:bg-[#C4182A] transition-colors">
                            Request a Consultation
                        </a>
                        <a href="#pricing" class="h-[44px] px-8 bg-white text-dark rounded-md flex items-center justify-center font-medium text-[14px] hover:bg-gray-100 transition-colors">
                            View Pricing Models
                        </a>
                    </div>
                </div>

                <!-- Right Visual -->
                <div class="w-full lg:w-[45%] xl:w-[40%] flex justify-center lg:justify-end">
                    <div class="w-full max-w-[500px] aspect-[4/5] rounded-[24px] overflow-hidden relative shadow-2xl">
                        <img src="{{ isset($contentBlocks['services_hero_image']) && $contentBlocks['services_hero_image']->hasMedia('default') ? $contentBlocks['services_hero_image']->getFirstMediaUrl('default') : asset('assets/images/downloaded/photo_1551434678_e076c223a692.jpg') }}" alt="Engineer in server room" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-t from-dark/80 via-transparent to-transparent"></div>
                    </div>
                </div>
        </section>

        <!-- Service Catalog Header -->
        <div class="mb-12" id="pricing">
            <h2 class="font-space font-bold text-[30px] leading-[36px] tracking-[-0.75px] text-dark mb-3">{{ $contentBlocks['services_catalog_title']->content ?? 'Comprehensive Service Catalog' }}</h2>
            <p class="text-[18px] text-gray-body leading-[28px] max-w-[770px]">
                {{ $contentBlocks['services_catalog_desc']->content ?? 'Explore our core service offerings. Each solution is tailored to your specific operational requirements and budget constraints.' }}
            </p>
        </div>

        <!-- Services Grid -->
        <div class="grid lg:grid-cols-2 gap-6 mb-24">
            @forelse($services ?? [] as $index => $service)
            <div class="bg-white border border-gray-border rounded-[16px] overflow-hidden flex flex-col box-shadow custom-hover-lift hover:shadow-lg transition-all duration-300">
                <!-- Top Section -->
                <div class="bg-gray-light/30 border-b border-gray-border/50 p-6 md:p-8 relative">
                    <div class="flex gap-4 items-center">
                        @if($service->getFirstMediaUrl('default'))
                            <div class="w-[56px] h-[56px] bg-blue-light border border-blue-primary/10 rounded-xl flex items-center justify-center shrink-0 overflow-hidden p-2">
                                <img src="{{ $service->getFirstMediaUrl('default') }}" alt="{{ $service->title }}" class="w-full h-full object-contain">
                            </div>
                        @else
                            <div class="w-[56px] h-[56px] bg-blue-light border border-blue-primary/10 rounded-xl flex items-center justify-center text-blue-primary shrink-0">
                                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"/><path d="M12 12V8"/></svg>
                            </div>
                        @endif
                        <div>
                            <h3 class="font-space font-bold text-[24px] text-dark">{{ $service->title }}</h3>
                        </div>
                    </div>
                </div>
                
                <!-- Content Section -->
                <div class="p-6 md:p-8 flex-1 flex flex-col prose prose-sm max-w-none text-gray-body">
                    {!! $service->description !!}
                </div>

                <!-- Bottom Section -->
                <div class="bg-white border-t border-gray-border p-6 md:p-8 flex flex-wrap gap-4 items-center justify-end mt-auto">
                    <a href="{{ route('contact') }}" class="h-[40px] px-6 bg-primary text-white rounded-md flex items-center justify-center font-medium text-[14px] hover:bg-[#C4182A] transition-colors gap-1.5 shrink-0">
                        {{ __('Request Quote') }}
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>
            @empty
                <div class="col-span-full bg-white rounded-[20px] border border-dashed border-gray-border p-12 text-center text-gray-body shadow-sm">
                    <h3 class="text-[20px] font-bold text-dark mb-2">No Services Available</h3>
                    <p class="text-[15px]">We are currently updating our service offerings. Please check back soon.</p>
                </div>
            @endforelse
        </div>

        <!-- The ATS Methodology -->
        <section class="bg-gray-light border border-gray-border rounded-[16px] py-16 px-6 relative mb-24 text-center">
            <h2 class="font-space font-bold text-[30px] leading-[36px] tracking-[-0.75px] text-dark mb-4">{{ $contentBlocks['services_methodology_title']->content ?? 'The ATS Methodology' }}</h2>
            <p class="text-[18px] text-gray-body leading-[28px] max-w-[651px] mx-auto mb-20">
                {{ $contentBlocks['services_methodology_desc']->content ?? "We don't just fix problems; we engineer solutions. Our proven three-step process ensures your IT investments align perfectly with your business goals." }}
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 relative max-w-[1000px] mx-auto">
                <!-- Step 1 -->
                <div class="flex flex-col items-center">
                    <div class="w-[96px] h-[96px] bg-white border-4 border-gray-light rounded-full flex items-center justify-center relative z-10 mb-6 drop-shadow-sm">
                        <div class="w-[64px] h-[64px] rounded-full bg-red-muted flex items-center justify-center">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                        </div>
                    </div>
                    <h3 class="font-space font-bold text-[20px] mb-3 leading-[28px]">{{ $contentBlocks['services_step_1_title']->content ?? '1. Discovery & Audit' }}</h3>
                    <p class="text-[14px] text-gray-body leading-[20px] max-w-[230px]">{{ $contentBlocks['services_step_1_desc']->content ?? 'We analyze your current infrastructure, identify bottlenecks, and define your operational goals.' }}</p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center">
                    <div class="w-[96px] h-[96px] bg-white border-4 border-gray-light rounded-full flex items-center justify-center relative z-10 mb-6 drop-shadow-sm">
                        <div class="w-[64px] h-[64px] rounded-full bg-red-muted flex items-center justify-center">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                        </div>
                    </div>
                    <h3 class="font-space font-bold text-[20px] mb-3 leading-[28px]">{{ $contentBlocks['services_step_2_title']->content ?? '2. Strategy & Design' }}</h3>
                    <p class="text-[14px] text-gray-body leading-[20px] max-w-[236px]">{{ $contentBlocks['services_step_2_desc']->content ?? 'Our architects draft a tailored, scalable solution focusing on efficiency and high ROI.' }}</p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center">
                    <div class="w-[96px] h-[96px] bg-white border-4 border-gray-light rounded-full flex items-center justify-center relative z-10 mb-6 drop-shadow-sm">
                        <div class="w-[64px] h-[64px] rounded-full bg-red-muted flex items-center justify-center">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        </div>
                    </div>
                    <h3 class="font-space font-bold text-[20px] mb-3 leading-[28px]">{{ $contentBlocks['services_step_3_title']->content ?? '3. Deployment & Support' }}</h3>
                    <p class="text-[14px] text-gray-body leading-[20px] max-w-[227px]">{{ $contentBlocks['services_step_3_desc']->content ?? 'Seamless implementation followed by rigorous testing and ongoing proactive maintenance.' }}</p>
                </div>
            </div>
        </section>

        <!-- Ready to upgrade Contact CTA -->
        <section class="bg-white border border-gray-border rounded-[16px] py-16 px-6 text-center max-w-[1248px] mx-auto box-shadow relative overflow-hidden">
            <div class="flex flex-col items-center">
                <div class="w-[64px] h-[64px] bg-blue-primary/10 rounded-full flex items-center justify-center mb-6">
                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#365EE2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                </div>
                <h2 class="font-space font-bold text-[30px] leading-[36px] text-dark max-w-[565px] mb-4">{{ $contentBlocks['services_cta_title']->content ?? 'Ready to upgrade your infrastructure?' }}</h2>
                <p class="text-[18px] text-gray-body leading-[28px] max-w-[533px] mb-8">
                    {{ $contentBlocks['services_cta_desc']->content ?? 'Speak directly with one of our senior solutions architects to discuss your specific requirements and get a preliminary estimate.' }}
                </p>
                <a href="{{ route('contact') }}" class="inline-flex h-[44px] px-8 bg-primary text-white rounded-md font-medium text-[14px] items-center justify-center hover:bg-[#C4182A] transition-colors">
                    Contact Sales Team
                </a>
            </div>
        </section>

    </main>
@endsection
