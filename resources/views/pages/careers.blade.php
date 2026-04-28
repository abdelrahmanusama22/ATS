@extends('layouts.app')

@section('title', 'Careers - ATS')

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 md:px-10 py-16 md:py-24">
        
        <div class="text-center mb-16">
            <h1 class="text-[40px] md:text-[56px] font-space font-bold text-dark leading-tight tracking-tight mb-4">{{ $contentBlocks['careers_hero_title']->content ?? 'Join Our Team' }}</h1>
            <p class="text-[18px] text-gray-body max-w-[650px] mx-auto leading-relaxed">{{ $contentBlocks['careers_hero_desc']->content ?? 'Discover your next career opportunity and help us build the future of Enterprise IT.' }}</p>
        </div>

        <div class="space-y-6 max-w-[900px] mx-auto">
            @forelse($careers as $job)
                <div class="bg-white border border-gray-border rounded-xl p-8 box-shadow hover:shadow-lg transition-shadow">
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-6">
                        <div>
                            <h2 class="text-[24px] font-bold text-dark mb-2">{{ $job->title }}</h2>
                            <div class="flex flex-wrap items-center gap-4 text-[14px] text-gray-body">
                                <div class="flex items-center gap-1.5">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                    {{ $job->location ?? 'Remote' }}
                                </div>
                                <div class="flex items-center gap-1.5">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 00-2-2h-4a2 2 0 00-2 2v16"/></svg>
                                    {{ $job->type ?? 'Full-Time' }}
                                </div>
                                @if($job->salary)
                                <div class="flex items-center gap-1.5">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg>
                                    {{ $job->salary }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <a href="{{ route('contact') }}?subject=Job Application: {{ urlencode($job->title) }}" class="h-[44px] px-6 bg-primary text-white rounded-md flex items-center justify-center font-medium text-[15px] hover:bg-[#C4182A] transition-colors shrink-0">
                            Apply Now
                        </a>
                    </div>
                    
                    <div class="prose max-w-none text-[15px] text-gray-body line-clamp-3">
                        {!! $job->description !!}
                    </div>
                    
                    @if($job->requirements)
                        <div class="mt-4">
                            <h3 class="text-[14px] font-bold text-dark mb-2">Key Requirements:</h3>
                            <div class="prose max-w-none text-[14px] text-gray-body">
                                {!! $job->requirements !!}
                            </div>
                        </div>
                    @endif
                    
                    @if($job->closing_date)
                        <p class="text-[12px] text-gray-body mt-4 font-medium">Closing Date: {{ \Carbon\Carbon::parse($job->closing_date)->format('M d, Y') }}</p>
                    @endif
                </div>
            @empty
                <div class="border border-dashed border-gray-border rounded-xl p-12 text-center">
                    <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4 text-gray-400">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                    </div>
                    <h3 class="text-[20px] font-bold text-dark mb-2">No Open Positions</h3>
                    <p class="text-[15px] text-gray-body max-w-[400px] mx-auto">We are not actively hiring right now, but we are always looking for great talent. Feel free to reach out to us.</p>
                </div>
            @endforelse
        </div>
        
    </main>
@endsection
