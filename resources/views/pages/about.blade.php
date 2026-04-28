@extends('layouts.app')

@section('title', 'About Us - ATS')

@section('content')
    <!-- Hero Section -->
    <section class="max-w-[1440px] mx-auto px-6 md:px-12 lg:px-[120px] py-20">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            
            <!-- Left Content -->
            <div class="space-y-8">
                <div class="inline-flex h-[28px] px-3 items-center bg-red-muted rounded-full text-dark font-medium text-[14px]">
                    About ATS
                </div>
                
                <h1 class="font-space font-bold text-[48px] md:text-[60px] leading-[1.1] md:leading-[78px] tracking-[-1.5px] text-dark">
                    {!! $contentBlocks['about_hero_title']->content ?? 'Architecting the <span class="text-primary">Future</span> of Enterprise IT' !!}
                </h1>
                
                <p class="text-[18px] text-gray-body leading-[29px] max-w-[578px]">
                    {{ $contentBlocks['about_hero_desc']->content ?? "At ATS Alex Technology Systems, we don't just supply technology; we build the resilient, scalable foundations that empower modern businesses to thrive in a digital-first world." }}
                </p>
                
                <div class="flex flex-wrap items-center gap-4">
                    <a href="{{ route('contact') }}" class="h-[48px] px-8 bg-primary text-white rounded-md flex items-center justify-center font-medium text-[16px] hover:bg-[#C4182A] transition-colors gap-2">
                        Partner With Us
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('solutions') }}" class="h-[48px] px-8 bg-white border border-gray-border text-dark rounded-md flex items-center justify-center font-medium text-[16px] hover:bg-gray-50 transition-colors">
                        Explore Solutions
                    </a>
                </div>
            </div>

            <!-- Right Visual -->
            <div class="relative w-full h-[300px] md:h-[492px]">
                <div class="h-[40vh] md:h-[60vh] bg-dark relative flex items-center justify-center overflow-hidden rounded-[16px]">
                    <img src="{{ isset($contentBlocks['about_hero_image']) && $contentBlocks['about_hero_image']->hasMedia('default') ? $contentBlocks['about_hero_image']->getFirstMediaUrl('default') : asset('assets/images/downloaded/photo_1558494949_ef010cbdcc31.jpg') }}" alt="Server room" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-dark/60"></div>
                </div>
                
                <!-- Floating Card -->
                <div class="absolute -bottom-6 md:bottom-10 -left-4 md:-left-6 bg-white border border-gray-border rounded-[16px] p-5 flex items-center gap-4 shadow-lg w-[291px]">
                    <div class="w-[48px] h-[48px] rounded-xl flex items-center justify-center shrink-0">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#E21D2E" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"/></svg>
                    </div>
                    <div>
                        <div class="font-bold text-[16px] text-dark leading-[24px]">Innovation Driven</div>
                        <div class="text-[14px] text-gray-body leading-[20px]">Always ahead of the curve</div>
                    </div>
                </div>
            </div>
            
        </div>
    </section>

    <!-- Stats Section -->
    <section class="max-w-[1440px] mx-auto border-y border-gray-border bg-gray-light mt-10">
        <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-y md:divide-y-0 divide-gray-border">
            <div class="py-12 flex flex-col items-center justify-center">
                <div class="font-space font-bold text-[48px] text-primary leading-[48px]" data-counter>{{ $contentBlocks['about_stat_1_val']->content ?? '15+' }}</div>
                <div class="font-medium text-[16px] text-gray-body leading-[24px] mt-2">{{ $contentBlocks['about_stat_1_lbl']->content ?? 'Years of Excellence' }}</div>
            </div>
            <div class="py-12 flex flex-col items-center justify-center">
                <div class="font-space font-bold text-[48px] text-primary leading-[48px]" data-counter>{{ $contentBlocks['about_stat_2_val']->content ?? '450+' }}</div>
                <div class="font-medium text-[16px] text-gray-body leading-[24px] mt-2">{{ $contentBlocks['about_stat_2_lbl']->content ?? 'Enterprise Clients' }}</div>
            </div>
            <div class="py-12 flex flex-col items-center justify-center">
                <div class="font-space font-bold text-[48px] text-primary leading-[48px]" data-counter>{{ $contentBlocks['about_stat_3_val']->content ?? '99.9%' }}</div>
                <div class="font-medium text-[16px] text-gray-body leading-[24px] mt-2">{{ $contentBlocks['about_stat_3_lbl']->content ?? 'Service Uptime' }}</div>
            </div>
            <div class="py-12 flex flex-col items-center justify-center">
                <div class="font-space font-bold text-[48px] text-primary leading-[48px]" data-counter>{{ $contentBlocks['about_stat_4_val']->content ?? '24/7' }}</div>
                <div class="font-medium text-[16px] text-gray-body leading-[24px] mt-2">{{ $contentBlocks['about_stat_4_lbl']->content ?? 'Dedicated Support' }}</div>
            </div>
        </div>
    </section>

    <!-- Our Journey -->
    <section class="max-w-[1440px] mx-auto px-6 py-24 text-center">
        <h2 class="font-space font-bold text-[30px] leading-[36px] text-dark mb-6">{{ $contentBlocks['about_journey_title']->content ?? 'Our Journey' }}</h2>
        <div class="max-w-[758px] mx-auto space-y-6 prose prose-lg text-gray-body">
            {!! $contentBlocks['about_journey_content']->content ?? '<p>Founded on the principle that robust technology should be an enabler, not a bottleneck, ATS has grown from a specialized hardware vendor into a premier, full-suite IT solutions provider.</p>' !!}
        </div>
    </section>

    <!-- A Legacy of Growth Timeline -->
    <section class="max-w-[1440px] mx-auto px-6 md:px-[24px] py-16">
        <div class="bg-white border border-gray-border rounded-[16px] py-16 px-6 relative overflow-hidden">
            <h2 class="font-space font-bold text-[24px] text-center mb-24">A Legacy of Growth</h2>
            
            <div class="relative max-w-[1262px] mx-auto">
                <!-- The continuous line -->
                <div class="hidden md:block absolute top-[15px] left-0 w-full h-[2px] bg-gray-border"></div>
                
                <div class="grid grid-cols-1 md:grid-cols-5 gap-12 md:gap-4 text-center relative z-10">
                    @forelse($timelineEvents ?? [] as $event)
                    <div class="relative flex flex-col items-center">
                        <div class="w-[32px] h-[32px] rounded-full bg-primary flex items-center justify-center mb-6 border-[10px] border-white relative z-10 shadow-sm mx-auto"></div>
                        <h3 class="font-space font-bold text-[20px] mb-1">{{ $event->year }}</h3>
                        <div class="font-space font-medium text-[14px] text-dark mb-2">{{ $event->title }}</div>
                        <p class="text-[12px] text-gray-body max-w-[191px] mx-auto">{{ $event->description }}</p>
                    </div>
                    @empty
                    <div class="col-span-full text-center text-gray-body">Timeline events are currently being updated.</div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Certified Excellence -->
    <section class="max-w-[1440px] mx-auto px-6 py-24 text-center">
        <h2 class="font-space font-bold text-[30px] leading-[36px] text-dark mb-4">Certified Excellence</h2>
        <p class="text-[16px] text-gray-body max-w-[485px] mx-auto mb-16">
            Adhering to the highest global standards of quality and security.
        </p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-center">
            @forelse($certifications ?? [] as $cert)
            <div class="bg-white border border-gray-border rounded-[10px] p-6 flex flex-col items-center">
                <div class="w-[64px] h-[64px] rounded-full bg-gray-light flex items-center justify-center mb-6 text-primary overflow-hidden">
                    @if($cert->getFirstMediaUrl('default'))
                        <img src="{{ $cert->getFirstMediaUrl('default') }}" alt="{{ $cert->title }}" class="w-full h-full object-contain">
                    @else
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    @endif
                </div>
                <h3 class="font-space font-bold text-[18px] mb-1">{{ $cert->title }}</h3>
                <div class="text-[14px] text-gray-body">{{ $cert->description }}</div>
            </div>
            @empty
                <div class="col-span-full text-center text-gray-body">Certifications are currently being updated.</div>
            @endforelse
        </div>
    </section>

    <!-- Trusted Technology Partners -->
    <section class="max-w-[1440px] mx-auto px-6 py-12 text-center pb-24 border-b border-gray-border">
        <h2 class="font-space font-bold text-[30px] leading-[36px] text-dark mb-4">Trusted Technology Partners</h2>
        <p class="text-[16px] text-gray-body max-w-[532px] mx-auto mb-12">
            We collaborate with industry leaders to deliver best-in-class solutions.
        </p>
        
        <div class="flex flex-wrap items-center justify-center gap-6 opacity-70">
            @forelse($partners ?? [] as $partner)
            <a href="{{ $partner->url ?? '#' }}" target="_blank" class="w-[128px] h-[48px] bg-gray-light border border-gray-border rounded-[4px] flex items-center justify-center text-[16px] font-medium text-gray-body overflow-hidden transition-opacity hover:opacity-100">
                @if($partner->getFirstMediaUrl('default'))
                    <img src="{{ $partner->getFirstMediaUrl('default') }}" alt="{{ $partner->name }}" class="h-full w-full object-contain p-2">
                @else
                    {{ $partner->name }}
                @endif
            </a>
            @empty
            <div class="w-[128px] h-[48px] bg-gray-light border border-gray-border rounded-[4px] flex items-center justify-center text-[16px] font-medium text-gray-body">No Partners</div>
            @endforelse
        </div>
    </section>

    <!-- Leadership Team -->
    <section class="max-w-[1440px] mx-auto bg-gray-light">
        <div class="px-6 md:px-[24px] py-24">
            <h2 class="font-space font-bold text-[30px] leading-[36px] text-dark mb-6">Leadership Team</h2>
            <p class="text-[18px] text-gray-body leading-[28px] max-w-[636px] mb-16">
                Our executive team brings decades of combined experience in enterprise technology, engineering, and strategic business management.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($teamMembers ?? [] as $member)
                <div class="bg-white border border-gray-border rounded-[10px] overflow-hidden">
                    <div class="h-[331px] bg-[#F3F4F6] w-full">
                        <img src="{{ $member->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6">
                        <h3 class="font-space font-bold text-[20px] mb-1">{{ $member->name }}</h3>
                        <div class="font-medium text-[14px] text-primary mb-4">{{ $member->role }}</div>
                        <p class="text-[14px] text-gray-body leading-[23px]">{{ strip_tags($member->bio) }}</p>
                    </div>
                </div>
                @empty
                    <div class="col-span-full border border-dashed border-gray-border rounded-xl p-12 text-center text-gray-body">
                        We are currently updating our leadership team profiles. Check back soon.
                    </div>
                @endforelse
            </div>

            <!-- CTA Matrix -->
            <div class="mt-24 border-2 border-gray-border rounded-[16px] bg-white relative overflow-hidden">
                <div class="absolute inset-x-0 top-0 h-[128px] max-w-[1041px] mx-auto bg-primary/5 blur-[100px] rounded-full"></div>
                
                <div class="relative z-10 text-center py-20 px-6">
                    <h2 class="font-space font-bold text-[36px] md:text-[48px] leading-[1.1] text-dark max-w-[623px] mx-auto mb-6">
                        Ready to Transform Your IT Infrastructure?
                    </h2>
                    <p class="text-[18px] text-gray-body leading-[28px] max-w-[650px] mx-auto mb-10">
                        Connect with our engineering team to discuss your specific challenges and discover how ATS can architect a solution tailored for your enterprise.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex h-[56px] px-8 items-center justify-center bg-primary text-white rounded-md font-medium text-[18px] hover:bg-[#C4182A] transition-colors gap-2">
                        Contact Our Experts
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                    </a>
                </div>
            </div>

        </div>
    </section>
@endsection
