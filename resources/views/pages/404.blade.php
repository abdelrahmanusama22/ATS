@extends('layouts.app')

@section('title', '404 - Page Not Found | ATS')

@section('content')
    <main class="max-w-[960px] mx-auto px-6 py-20 md:py-28 text-center">
        <span class="inline-block bg-red-muted text-primary text-[12px] font-bold px-3 py-1 rounded-full mb-6">Error 404</span>
        <h1 class="text-[32px] md:text-[48px] leading-tight font-bold mb-6">Page Not Found</h1>
        <p class="text-[16px] text-gray-body max-w-[680px] mx-auto mb-10 leading-relaxed">
            The page you are looking for does not exist or may have been moved. You can return to the homepage or continue browsing our product catalog.
        </p>

        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a id="notfound-home-btn" href="{{ route('home') }}" class="inline-flex items-center justify-center h-[48px] px-7 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">
                Back to Home
            </a>
            <a id="notfound-catalog-btn" href="{{ route('catalog') }}" class="inline-flex items-center justify-center h-[48px] px-7 rounded-md border border-gray-border text-dark font-semibold hover:bg-gray-50 transition-colors">
                Browse Catalog
            </a>
        </div>
    </main>
@endsection
