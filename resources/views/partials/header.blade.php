@php
    $isArabic = app()->getLocale() == 'ar';
    $isRtl = $isArabic;
<<<<<<< Updated upstream
=======
    
    // Language strings derived from shared-components.js
    $lang = $isArabic ? [
        'loc' => 'الإسكندرية، مصر',
        'email' => 'sales@ats.com',
        'langName' => 'English',
        'langLink' => route('lang.switch', 'en'),

        'myAccount' => 'حسابي',
        'myOrders' => 'طلباتي',
        'cart' => 'السلة',
        'items' => 'عناصر',
        'checkout' => 'الدفع',
        'viewCart' => 'عرض السلة',
        'subtotal' => 'الإجمالي الفرعي',
        'home' => 'الرئيسية',
        'products' => 'المنتجات',
        'solutions' => 'الحلول',
        'services' => 'الخدمات',
        'about' => 'من نحن',
        'contact' => 'اتصل بنا',
        'support' => 'الارتقاء بأعمالك',
        'menu' => 'القائمة',
        'langShort' => 'EN',
        'quote' => 'طلب استشارة'
    ] : [
        'loc' => 'Alexandria, EG',
        'email' => 'sales@ats.com',
        'langName' => 'العربية',
        'langLink' => route('lang.switch', 'ar'),

        'myAccount' => 'My Account',
        'myOrders' => 'My Orders',
        'cart' => 'Cart',
        'items' => 'Items',
        'checkout' => 'Checkout',
        'viewCart' => 'View Cart',
        'subtotal' => 'Subtotal',
        'home' => 'Home',
        'products' => 'Shop Products',
        'solutions' => 'Solutions',
        'services' => 'Services',
        'about' => 'About Us',
        'contact' => 'Contact',
        'support' => 'Support',
        'menu' => 'Menu',
        'langShort' => 'AR',
        'quote' => 'Get a Quote'
    ];
>>>>>>> Stashed changes

    $currentPath = request()->path();
    function activeClass($paths, $currentPath) {
        foreach($paths as $p) {
            if ($currentPath == $p || ($p == 'index.html' && $currentPath == '/')) {
                return 'text-primary';
            }
        }
        return 'text-gray-body hover:text-dark';
    }
@endphp

<div id="site-header">
    <!-- Top Bar -->
    <div class="bg-background border-b border-gray-border text-[12px] text-gray-body h-[40px] hidden md:flex items-center">
        <div class="max-w-[1280px] w-full mx-auto px-6 md:px-10 flex justify-between">
            <div class="flex items-center gap-6">
                <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg> {{ $globalSettings['contact_address'] ?? ($contentBlocks['header_location']->content ?? 'Alexandria, EG') }}</span>
                <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.93 1.93 0 01-2.06 0L2 7"/></svg> {{ $globalSettings['contact_email'] ?? ($contentBlocks['header_email']->content ?? 'sales@ats.com') }}</span>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ route('lang.switch', $isArabic ? 'en' : 'ar') }}" class="flex items-center gap-1.5 cursor-pointer hover:text-dark font-bold">
                    {{ $isArabic ? 'English' : 'العربية' }}
                </a>
                <a href="{{ route('account') }}" class="cursor-pointer hover:text-dark">{{ $contentBlocks['header_my_account']->content ?? 'My Account' }}</a>
                <a href="{{ route('orders') }}" class="cursor-pointer hover:text-dark">{{ $contentBlocks['header_my_orders']->content ?? 'My Orders' }}</a>
                <div class="relative group/cart">
                    <a href="{{ route('cart') }}" class="flex items-center gap-1.5 cursor-pointer text-primary font-medium hover:text-primary relative py-2">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg> 
                        {{ $contentBlocks['header_cart']->content ?? 'Cart' }} (<span class="dropdown-cart-count">0</span>)
                    </a>
                    <div class="absolute top-[100%] {{ $isRtl ? 'left-0' : 'right-0' }} w-[320px] bg-white border border-gray-border rounded-[12px] shadow-lg opacity-0 invisible group-hover/cart:opacity-100 group-hover/cart:visible transition-all duration-200 z-50 overflow-hidden translate-y-2 group-hover/cart:translate-y-0 text-dark">
                        <div class="p-4 border-b border-gray-border flex justify-between items-center bg-gray-50/50">
                            <span class="font-bold text-[14px]">{{ $contentBlocks['header_cart']->content ?? 'Cart' }}</span>
                            <span class="text-[12px] text-gray-body bg-gray-200 px-2 py-0.5 rounded-full font-medium"><span class="dropdown-cart-count-text">0</span> {{ $contentBlocks['header_items']->content ?? 'Items' }}</span>
                        </div>
                        <div class="max-h-[300px] overflow-y-auto p-4 flex flex-col gap-4 dropdown-cart-items"></div>
                        <div class="p-4 border-t border-gray-border bg-gray-50/50">
                            <div class="flex justify-between items-center mb-4">
                                <span class="text-[13px] text-gray-body font-medium">{{ $contentBlocks['header_subtotal']->content ?? 'Subtotal' }}</span>
                                <span class="font-bold text-[16px] dropdown-cart-total">0</span>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('cart') }}" class="flex-1 h-[38px] flex items-center justify-center bg-white border border-gray-border rounded-md text-[13px] font-medium hover:bg-gray-50 transition-colors">{{ $contentBlocks['header_view_cart']->content ?? 'View Cart' }}</a>
                                <a href="{{ route('checkout') }}" class="flex-1 h-[38px] flex items-center justify-center bg-primary text-white rounded-md text-[13px] font-medium hover:bg-[#C4182A] transition-colors shadow-sm">{{ $contentBlocks['header_checkout']->content ?? 'Checkout' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="bg-white sticky top-0 z-40 h-[64px] border-b border-gray-border shadow-sm hidden lg:flex items-center" id="mainNav">
        <div class="max-w-[1280px] w-full mx-auto px-6 md:px-10 flex justify-between items-center text-[14px]">
            <div class="flex items-center gap-6">
                <a href="{{ route('home') }}" class="flex items-center shrink-0">
                    <img src="{{ asset('assets/images/logo.jpeg') }}" alt="ATS" class="h-10 rounded">
                </a>
                <div class="hidden lg:flex items-center gap-8 font-medium">
<<<<<<< Updated upstream
                    @if(isset($mainMenu) && $mainMenu)
                        @foreach($mainMenu->items as $item)
                            <a href="{{ $item->url ?? route('page.show', $item->page?->slug ?? '#') }}" class="{{ activeClass([ltrim(parse_url($item->url, PHP_URL_PATH), '/')], $currentPath) }} transition-colors hover:text-primary">
                                {{ $item->title }}
=======
                    @if(isset($menus['header_main']))
                        @foreach($menus['header_main']->items as $menuItem)
                            <a href="{{ $menuItem->url ?? ($menuItem->page_id ? url('pages/' . $menuItem->page->slug) : '#') }}" 
                               target="{{ $menuItem->target }}"
                               class="{{ $currentPath == trim($menuItem->url, '/') ? 'text-primary' : 'text-gray-body hover:text-dark' }} transition-colors">
                                {!! $menuItem->icon_svg !!} {{ $menuItem->title }}
>>>>>>> Stashed changes
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
            
            <div class="flex items-center gap-4 text-[14px]">
                <span class="hidden lg:block text-gray-body font-medium">{{ $contentBlocks['header_support']->content ?? 'Support' }}</span>
                <div class="hidden lg:block w-px h-4 bg-gray-border"></div>
                <a href="tel:{{ str_replace(' ', '', $globalSettings['contact_phone'] ?? '16000') }}" class="hidden lg:flex items-center gap-1.5 font-bold text-primary"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg> {{ $globalSettings['contact_phone'] ?? ($isArabic ? '١٦٠٠٠' : '+20 123 456 7890') }}</a>
            </div>
        </div>
    </nav>
    <header class="flex lg:hidden bg-white border-b border-gray-border h-[60px] sticky top-0 z-50 px-4 items-center justify-between" id="mobileHeader">
        <div class="flex items-center gap-3">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('assets/images/logo.jpeg') }}" alt="ATS" class="h-8 rounded">
            </a>
        </div>
        <div class="flex items-center gap-4">
            <button class="text-gray-body hover:text-dark"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button>
            <a href="{{ route('lang.switch', $isArabic ? 'en' : 'ar') }}" class="text-gray-body hover:text-dark flex items-center gap-1">
                <span class="text-[12px] font-bold">{{ $isArabic ? 'EN' : 'AR' }}</span>
            </a>
        </div>
    </header>
</div>
