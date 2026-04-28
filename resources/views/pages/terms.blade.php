@extends('layouts.app')

@section('title', 'Terms of Service - ATS')

@section('content')
    <main class="max-w-[980px] mx-auto px-6 py-14 md:py-20">
        @if($page)
        <header class="mb-10">
            <span class="inline-block bg-red-muted text-primary text-[12px] font-bold px-3 py-1 rounded-full mb-4">{{ __('Legal') }}</span>
            <h1 class="text-[32px] md:text-[44px] font-bold leading-tight mb-3">{{ $page->title }}</h1>
            <p id="terms-updated-date" class="text-[14px] text-gray-body">{{ __('Last updated:') }} {{ $page->updated_at->format('F j, Y') }}</p>
        </header>

        <section id="terms-content" class="space-y-8 text-[15px] leading-7 text-gray-body prose prose-lg max-w-none">
            {!! $page->content !!}
        </section>
        @else
        <header class="mb-10">
            <span class="inline-block bg-red-muted text-primary text-[12px] font-bold px-3 py-1 rounded-full mb-4">{{ __('Legal') }}</span>
            <h1 class="text-[32px] md:text-[44px] font-bold leading-tight mb-3">{{ __('Terms of Service') }}</h1>
        </header>
        <section id="terms-content" class="space-y-8 text-[15px] leading-7 text-gray-body">
            <p>{{ __('Terms of service content is currently being updated.') }}</p>
        </section>
        @endif
        
        <div class="mt-10 flex flex-col sm:flex-row gap-3">
            <a href="{{ route('contact') }}" class="inline-flex items-center justify-center h-[44px] px-6 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">{{ __('Contact Us') }}</a>
            <a href="{{ route('home') }}" class="inline-flex items-center justify-center h-[44px] px-6 rounded-md border border-gray-border text-dark font-semibold hover:bg-gray-50 transition-colors">{{ __('Back to Home') }}</a>
        </div>
    </main>
@endsection
