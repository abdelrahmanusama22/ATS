@php
    $isArabic = app()->getLocale() == 'ar';
@endphp

<footer class="bg-white pt-16 pb-8 border-t border-gray-border">
    <div class="max-w-[1280px] mx-auto px-6 md:px-10">
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-10 mb-16">
            <div class="lg:pr-8">
                <img src="{{ asset('assets/images/logo.jpeg') }}" alt="ATS Local" class="h-10 mb-4">
                <p class="text-[13px] text-gray-body leading-[1.8] mb-6">
                    {{ $isArabic ? 'توفر أنظمة أليكس تكنولوجي بنية تحتية متميزة لتكنولوجيا المعلومات، وحلول الشبكات، والخدمات المهنية للشركات عبر المنطقة.' : 'Alex Technology Systems provides premium IT infrastructure, networking solutions, and professional services to businesses across the region.' }}
                </p>
                <div class="flex gap-4 justify-start text-gray-body mt-2">
                    <a href="{{ route('contact') }}" class="hover:text-dark transition-colors"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
                    <a href="{{ route('contact') }}" class="hover:text-dark transition-colors"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/></svg></a>
                    <a href="{{ route('contact') }}" class="hover:text-dark transition-colors"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
                    <a href="{{ route('contact') }}" class="hover:text-dark transition-colors"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg></a>
                </div>
            </div>
            <div>
                <h4 class="font-bold text-[13px] uppercase tracking-wider mb-6">{{ $isArabic ? 'المنتجات' : 'Products' }}</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('catalog') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'الخوادم' : 'Servers' }}</a></li>
                    <li><a href="{{ route('catalog') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'الشبكات' : 'Networking' }}</a></li>
                    <li><a href="{{ route('catalog') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'التخزين' : 'Storage' }}</a></li>
                    <li><a href="{{ route('catalog') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'أنظمة الأمان' : 'Security Systems' }}</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-[13px] uppercase tracking-wider mb-6">{{ $isArabic ? 'الشركة' : 'Company' }}</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('about') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'من نحن' : 'About Us' }}</a></li>
                    <li><a href="{{ route('services') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'الخدمات' : 'Services' }}</a></li>
                    <li><a href="{{ route('solutions') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'الحلول' : 'Solutions' }}</a></li>
                    <li><a href="{{ route('contact') }}" class="text-[14px] text-gray-body hover:text-dark">{{ $isArabic ? 'اتصل بنا' : 'Contact' }}</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-bold text-[13px] uppercase tracking-wider mb-6">{{ $isArabic ? 'معلومات الاتصال' : 'Contact Info' }}</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3 text-[14px] text-gray-body">
                        <svg class="mt-0.5 min-w-[16px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <span>{{ $isArabic ? '123 Tech Avenue، سموحة،' : '123 Tech Avenue, Smouha,' }}<br>{{ $isArabic ? 'الإسكندرية، مصر' : 'Alexandria, Egypt' }}</span>
                    </li>
                    <li class="flex items-start gap-3 text-[14px] text-gray-body">
                        <svg class="mt-0.5 min-w-[16px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg>
                        <span>+20 123 456 7890</span>
                    </li>
                    <li class="flex items-start gap-3 text-[14px] text-gray-body">
                        <svg class="mt-0.5 min-w-[16px]" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.93 1.93 0 01-2.06 0L2 7"/></svg>
                        <span>info@ats-egypt.com</span>
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-border pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-[12px] text-gray-body">
            <p>&copy; 2026 {{ $isArabic ? 'أنظمة أليكس تكنولوجي. جميع الحقوق محفوظة.' : 'Alex Technology Systems. All rights reserved.' }}</p>
            <div class="flex gap-6 font-medium">
                <a href="{{ route('privacy') }}" class="hover:text-dark">{{ $isArabic ? 'سياسة الخصوصية' : 'Privacy Policy' }}</a>
                <a href="{{ route('terms') }}" class="hover:text-dark">{{ $isArabic ? 'شروط الخدمة' : 'Terms of Service' }}</a>
            </div>
        </div>
    </div>
</footer>
