@php
    $isArabic = app()->getLocale() == 'ar';
    $isRtl = $isArabic;
    $currentPath = request()->path();
    
    // Language strings derived from shared-components.js
    $lang = $isArabic ? [
        'home' => 'الرئيسية',
        'products' => 'المنتجات',
        'solutions' => 'الحلول',
        'services' => 'الخدمات',
        'about' => 'من نحن',
        'contact' => 'اتصل بنا',
        'myAccount' => 'حسابي',
        'myOrders' => 'طلباتي',
        'cart' => 'السلة',
        'menu' => 'القائمة',
        'quote' => 'طلب استشارة'
    ] : [
        'home' => 'Home',
        'products' => 'Shop Products',
        'solutions' => 'Solutions',
        'services' => 'Services',
        'about' => 'About Us',
        'contact' => 'Contact',
        'myAccount' => 'My Account',
        'myOrders' => 'My Orders',
        'cart' => 'Cart',
        'menu' => 'Menu',
        'quote' => 'Get a Quote'
    ];

    function navActiveClass($paths, $currentPath) {
        foreach($paths as $p) {
            if ($currentPath == $p || ($p == 'index.html' && $currentPath == '/')) {
                return 'text-primary';
            }
        }
        return 'text-gray-body hover:text-dark';
    }

    $drawerTransform = $isRtl ? '-translate-x-full' : 'translate-x-full';
    $drawerClass = $isRtl ? 'left-0' : 'right-0';
@endphp

<div id="site-footer-nav">
    <div id="drawerOverlay" class="fixed inset-0 bg-dark/50 backdrop-blur-sm z-[100] hidden transition-opacity duration-300"></div>
    <div id="mobileDrawer" class="fixed top-0 {{ $drawerClass }} w-[312px] h-full bg-white z-[101] shadow-2xl transition-transform duration-300 transform {{ $drawerTransform }} flex flex-col">
        <div class="p-6 border-b border-gray-border flex justify-between items-center bg-gray-light/30">
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" class="flex items-center"><img src="{{ asset('assets/images/logo.jpeg') }}" alt="ATS" class="h-10 rounded"></a>
            </div>
            <button id="closeDrawerBtn" class="w-10 h-10 rounded-full flex items-center justify-center text-gray-body hover:bg-white hover:text-primary transition-all">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <div class="flex-1 overflow-y-auto py-8">
            <nav class="px-6 space-y-1">
                <a href="{{ route('home') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['/', 'index.html'], $currentPath) }} {{ navActiveClass(['/', 'index.html'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                    <span>{{ $lang['home'] }}</span>
                </a>
                <a href="{{ route('catalog') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['catalog'], $currentPath) }} {{ navActiveClass(['catalog'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                    <span>{{ $lang['products'] }}</span>
                </a>
                <a href="{{ route('solutions') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['solutions'], $currentPath) }} {{ navActiveClass(['solutions'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    <span>{{ $lang['solutions'] }}</span>
                </a>
                <a href="{{ route('services') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['services'], $currentPath) }} {{ navActiveClass(['services'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1-1v3"/><path d="M12 12V8"/></svg>
                    <span>{{ $lang['services'] }}</span>
                </a>
                <div class="h-px bg-gray-border/50 my-4 mx-4"></div>
                <a href="{{ route('about') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['about'], $currentPath) }} {{ navActiveClass(['about'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
                    <span>{{ $lang['about'] }}</span>
                </a>
                <a href="{{ route('contact') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['contact'], $currentPath) }} {{ navActiveClass(['contact'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                    <span>{{ $lang['contact'] }}</span>
                </a>
                <a href="{{ route('account') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['account'], $currentPath) }} {{ navActiveClass(['account'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="7" r="4"/></svg>
                    <span>{{ $lang['myAccount'] }}</span>
                </a>
                <a href="{{ route('orders') }}" class="flex items-center gap-4 py-4 px-4 rounded-xl {{ navActiveClass(['orders', 'order-detail', 'tracking'], $currentPath) }} {{ navActiveClass(['orders', 'order-detail', 'tracking'], $currentPath) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50' }} transition-all">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
                    <span>{{ $lang['myOrders'] }}</span>
                </a>
            </nav>
        </div>
        <div class="p-8 border-t border-gray-border bg-gray-light/30">
            <a href="{{ route('contact') }}" class="block w-full bg-primary text-white text-center py-4 rounded-2xl font-bold shadow-lg shadow-primary/20 hover:scale-95 transition-transform">
                {{ $lang['quote'] }}
            </a>
        </div>
    </div>
    <nav class="lg:hidden fixed bottom-1 left-4 right-4 bg-white/95 backdrop-blur-md h-[55px] border border-gray-border rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] z-[60] flex items-center justify-around px-2" id="bottomTabBar">
        <a href="{{ route('home') }}" class="flex flex-col items-center gap-0.5 {{ navActiveClass(['/', 'index.html'], $currentPath) }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            <span class="text-[9px] font-bold">{{ $lang['home'] }}</span>
        </a>
        <a href="{{ route('catalog') }}" class="flex flex-col items-center gap-0.5 {{ navActiveClass(['catalog', 'product'], $currentPath) }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
            <span class="text-[9px] font-bold">{{ $lang['products'] }}</span>
        </a>
        <a href="{{ route('solutions') }}" class="flex flex-col items-center gap-0.5 {{ navActiveClass(['solutions'], $currentPath) }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            <span class="text-[9px] font-bold">{{ $lang['solutions'] }}</span>
        </a>
        <a href="{{ route('services') }}" class="flex flex-col items-center gap-0.5 {{ navActiveClass(['services'], $currentPath) }}">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1-1v3"/><path d="M12 12V8"/></svg>
            <span class="text-[9px] font-bold">{{ $lang['services'] }}</span>
        </a>
        <a href="{{ route('cart') }}" class="flex flex-col items-center gap-0.5 {{ navActiveClass(['cart'], $currentPath) }}">
            <div class="relative">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                <span class="absolute -top-1.5 -right-1.5 bg-primary text-white text-[8px] w-3.5 h-3.5 rounded-full flex items-center justify-center font-bold dropdown-cart-count">0</span>
            </div>
            <span class="text-[9px] font-bold">{{ $lang['cart'] }}</span>
        </a>
        <button id="mobileMenuBtn" class="flex flex-col items-center gap-0.5 text-gray-body">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
            <span class="text-[9px] font-bold">{{ $lang['menu'] }}</span>
        </button>
    </nav>
    <div class="lg:hidden h-[72px]"></div>
</div>
