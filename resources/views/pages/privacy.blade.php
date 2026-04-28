@extends('layouts.app')

@section('title', 'Privacy Policy - ATS')

@section('content')
    <main class="max-w-[980px] mx-auto px-6 py-14 md:py-20">
        <header class="mb-10">
            <span class="inline-block bg-red-muted text-primary text-[12px] font-bold px-3 py-1 rounded-full mb-4">Policy</span>
            <h1 class="text-[32px] md:text-[44px] font-bold leading-tight mb-3">Privacy Policy</h1>
            <p id="privacy-updated-date" class="text-[14px] text-gray-body">Last updated: April 7, 2026</p>
        </header>

        <section id="privacy-toc" class="mb-10 bg-gray-light border border-gray-border rounded-xl p-5 md:p-6">
            <h2 class="text-[18px] font-bold mb-4">Contents</h2>
            <ul class="space-y-2 text-[14px]">
                <li><a href="#data-collection" class="text-primary hover:underline">1. Information We Collect</a></li>
                <li><a href="#data-use" class="text-primary hover:underline">2. How We Use Information</a></li>
                <li><a href="#data-sharing" class="text-primary hover:underline">3. Data Sharing and Disclosure</a></li>
                <li><a href="#user-rights" class="text-primary hover:underline">4. Your Rights</a></li>
                <li><a href="#contact-privacy" class="text-primary hover:underline">5. Contact</a></li>
            </ul>
        </section>

        <section id="privacy-content" class="space-y-8 text-[15px] leading-7 text-gray-body">
            <article id="data-collection">
                <h3 class="text-[22px] font-bold text-dark mb-3">1. Information We Collect</h3>
                <p>We collect information you provide directly when submitting forms, requesting quotes, or contacting support. We may also collect limited technical data required for basic site analytics and service reliability.</p>
            </article>

            <article id="data-use">
                <h3 class="text-[22px] font-bold text-dark mb-3">2. How We Use Information</h3>
                <p>We use collected data to respond to inquiries, prepare quotations, improve service quality, and maintain secure operations. We do not use your data for unrelated purposes without notice.</p>
            </article>

            <article id="data-sharing">
                <h3 class="text-[22px] font-bold text-dark mb-3">3. Data Sharing and Disclosure</h3>
                <p>We only share data with service providers necessary to operate the website and fulfill requested services. We do not sell personal information to third parties.</p>
            </article>

            <article id="user-rights">
                <h3 class="text-[22px] font-bold text-dark mb-3">4. Your Rights</h3>
                <p>You may request access, correction, or deletion of your personal data by contacting us. We process valid requests in accordance with applicable law and operational constraints.</p>
            </article>

            <article id="contact-privacy">
                <h3 class="text-[22px] font-bold text-dark mb-3">5. Contact</h3>
                <p>If you have any privacy-related questions, please reach out through our contact page and we will assist you promptly.</p>
                <div class="mt-5 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center h-[44px] px-6 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Contact Us</a>
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center h-[44px] px-6 rounded-md border border-gray-border text-dark font-semibold hover:bg-gray-50 transition-colors">Back to Home</a>
                </div>
            </article>
        </section>
    </main>
@endsection
