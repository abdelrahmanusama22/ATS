@extends('layouts.app')

@section('title', 'Terms of Service - ATS')

@section('content')
    <main class="max-w-[980px] mx-auto px-6 py-14 md:py-20">
        <header class="mb-10">
            <span class="inline-block bg-red-muted text-primary text-[12px] font-bold px-3 py-1 rounded-full mb-4">Legal</span>
            <h1 class="text-[32px] md:text-[44px] font-bold leading-tight mb-3">Terms of Service</h1>
            <p id="terms-updated-date" class="text-[14px] text-gray-body">Last updated: April 7, 2026</p>
        </header>

        <section id="terms-toc" class="mb-10 bg-gray-light border border-gray-border rounded-xl p-5 md:p-6">
            <h2 class="text-[18px] font-bold mb-4">Contents</h2>
            <ul class="space-y-2 text-[14px]">
                <li><a href="#acceptance" class="text-primary hover:underline">1. Acceptance of Terms</a></li>
                <li><a href="#use" class="text-primary hover:underline">2. Acceptable Use</a></li>
                <li><a href="#products" class="text-primary hover:underline">3. Product and Service Information</a></li>
                <li><a href="#liability" class="text-primary hover:underline">4. Limitation of Liability</a></li>
                <li><a href="#changes" class="text-primary hover:underline">5. Changes to Terms</a></li>
                <li><a href="#contact-terms" class="text-primary hover:underline">6. Contact</a></li>
            </ul>
        </section>

        <section id="terms-content" class="space-y-8 text-[15px] leading-7 text-gray-body">
            <article id="acceptance">
                <h3 class="text-[22px] font-bold text-dark mb-3">1. Acceptance of Terms</h3>
                <p>By accessing or using this website, you agree to these Terms of Service. If you do not agree, please discontinue use of the site and related services.</p>
            </article>

            <article id="use">
                <h3 class="text-[22px] font-bold text-dark mb-3">2. Acceptable Use</h3>
                <p>You agree to use this website only for lawful purposes, and not to disrupt service, attempt unauthorized access, or misuse any site functionality.</p>
            </article>

            <article id="products">
                <h3 class="text-[22px] font-bold text-dark mb-3">3. Product and Service Information</h3>
                <p>Product specifications, availability, and service details may change without prior notice. We work to keep all information accurate, but updates may occur as inventory and partner terms evolve.</p>
            </article>

            <article id="liability">
                <h3 class="text-[22px] font-bold text-dark mb-3">4. Limitation of Liability</h3>
                <p>To the extent permitted by law, ATS is not liable for indirect or consequential damages resulting from use of the site or reliance on provided information.</p>
            </article>

            <article id="changes">
                <h3 class="text-[22px] font-bold text-dark mb-3">5. Changes to Terms</h3>
                <p>We may revise these terms periodically. Continued use of the website after updates are posted constitutes acceptance of the revised terms.</p>
            </article>

            <article id="contact-terms">
                <h3 class="text-[22px] font-bold text-dark mb-3">6. Contact</h3>
                <p>For questions about these terms, please contact us through the contact page.</p>
                <div class="mt-5 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center h-[44px] px-6 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Contact Us</a>
                    <a href="{{ route('home') }}" class="inline-flex items-center justify-center h-[44px] px-6 rounded-md border border-gray-border text-dark font-semibold hover:bg-gray-50 transition-colors">Back to Home</a>
                </div>
            </article>
        </section>
    </main>
@endsection
