@extends('layouts.app')

@section('title', 'Coming Soon - ATS')

@section('content')
    <main class="max-w-[960px] mx-auto px-6 py-20 md:py-28 text-center">
        <span class="inline-block bg-red-muted text-primary text-[12px] font-bold px-3 py-1 rounded-full mb-6">New Feature</span>
        <h1 id="coming-soon-title" class="text-[32px] md:text-[48px] leading-tight font-bold mb-6">This Page Is Coming Soon</h1>
        <p class="text-[16px] text-gray-body max-w-[680px] mx-auto mb-10 leading-relaxed">
            We are currently preparing this section as part of the full platform rollout. In the meantime, you can return to the home page or contact our team for direct assistance.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a id="coming-soon-home-btn" href="{{ route('home') }}" class="inline-flex items-center justify-center h-[48px] px-7 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">
                Back to Home
            </a>
            <a id="coming-soon-contact-btn" href="{{ route('contact') }}" class="inline-flex items-center justify-center h-[48px] px-7 rounded-md border border-gray-border text-dark font-semibold hover:bg-gray-50 transition-colors">
                Contact Us
            </a>
        </div>
    </main>
@endsection
