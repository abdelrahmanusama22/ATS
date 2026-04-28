(function() {
    const isArabic = document.documentElement.lang === 'ar';
    const isRtl = document.documentElement.dir === 'rtl';
    const currentPath = window.location.pathname;
    const currentFile = currentPath.split('/').pop() || 'index.html';
    const sharedLocalePages = new Set([
        'index.html', 'catalog.html', 'product.html', 'cart.html', 'checkout.html',
        'solutions.html', 'services.html', 'about.html', 'contact.html', 'coming-soon.html', '404.html', 'privacy.html', 'terms.html', 'search.html', 'wishlist.html', 'orders.html', 'order-detail.html', 'tracking.html', 'account.html', 'login.html', 'signup.html'
    ]);

    function getLanguageSwitchLink() {
        const targetFile = sharedLocalePages.has(currentFile) ? currentFile : 'index.html';
        return isArabic ? `../${targetFile}` : `ar/${targetFile}`;
    }
    
    // Path to root directory to correctly reference assets
    const assetPath = isArabic ? '../' : './';
    
    const LANG = isArabic ? {
        loc: 'الإسكندرية، مصر',
        email: 'sales@ats.com',
        langName: 'English',
        langLink: getLanguageSwitchLink(),
        myAccount: 'حسابي',
        myOrders: 'طلباتي',
        cart: 'السلة',
        items: 'عناصر',
        checkout: 'الدفع',
        viewCart: 'عرض السلة',
        subtotal: 'الإجمالي الفرعي',
        home: 'الرئيسية',
        products: 'المنتجات',
        solutions: 'الحلول',
        services: 'الخدمات',
        about: 'من نحن',
        contact: 'اتصل بنا',
        support: 'الارتقاء بأعمالك',
        menu: 'القائمة',
        langShort: 'EN',
        quote: 'طلب استشارة'
    } : {
        loc: 'Alexandria, EG',
        email: 'sales@ats.com',
        langName: 'العربية',
        langLink: getLanguageSwitchLink(),
        myAccount: 'My Account',
        myOrders: 'My Orders',
        cart: 'Cart',
        items: 'Items',
        checkout: 'Checkout',
        viewCart: 'View Cart',
        subtotal: 'Subtotal',
        home: 'Home',
        products: 'Shop Products',
        solutions: 'Solutions',
        services: 'Services',
        about: 'About Us',
        contact: 'Contact',
        support: 'Support',
        menu: 'Menu',
        langShort: 'AR',
        quote: 'Get a Quote'
    };

    function activeClass(paths) {
        return paths.some(p => currentPath.endsWith(p)) ? 'text-primary' : 'text-gray-body hover:text-dark';
    }

    // function injectHeader() {
    //     const headerEl = document.getElementById('site-header');
    //     if (!headerEl) return;

    //     const html = `
    // <!-- Top Bar -->
    // <div class="bg-background border-b border-gray-border text-[12px] text-gray-body h-[40px] hidden md:flex items-center">
    //     <div class="max-w-[1280px] w-full mx-auto px-6 md:px-10 flex justify-between">
    //         <div class="flex items-center gap-6">
    //             <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg> ${LANG.loc}</span>
    //             <span class="flex items-center gap-1.5"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.93 1.93 0 01-2.06 0L2 7"/></svg> ${LANG.email}</span>
    //         </div>
    //         <div class="flex items-center gap-6">
    //             <a href="${LANG.langLink}" class="flex items-center gap-1.5 cursor-pointer hover:text-dark font-bold">
    //                 ${LANG.langName}
    //             </a>
    //             <a href="account.html" class="cursor-pointer hover:text-dark">${LANG.myAccount}</a>
    //             <a href="orders.html" class="cursor-pointer hover:text-dark">${LANG.myOrders}</a>
    //             <div class="relative group/cart">
    //                 <a href="cart.html" class="flex items-center gap-1.5 cursor-pointer text-primary font-medium hover:text-primary relative py-2">
    //                     <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg> 
    //                     ${LANG.cart} (<span class="dropdown-cart-count">0</span>)
    //                 </a>
    //                 <div class="absolute top-[100%] ${isRtl ? 'left-0' : 'right-0'} w-[320px] bg-white border border-gray-border rounded-[12px] shadow-lg opacity-0 invisible group-hover/cart:opacity-100 group-hover/cart:visible transition-all duration-200 z-50 overflow-hidden translate-y-2 group-hover/cart:translate-y-0 text-dark">
    //                     <div class="p-4 border-b border-gray-border flex justify-between items-center bg-gray-50/50">
    //                         <span class="font-bold text-[14px]">${LANG.cart}</span>
    //                         <span class="text-[12px] text-gray-body bg-gray-200 px-2 py-0.5 rounded-full font-medium"><span class="dropdown-cart-count-text">0</span> ${LANG.items}</span>
    //                     </div>
    //                     <div class="max-h-[300px] overflow-y-auto p-4 flex flex-col gap-4 dropdown-cart-items"></div>
    //                     <div class="p-4 border-t border-gray-border bg-gray-50/50">
    //                         <div class="flex justify-between items-center mb-4">
    //                             <span class="text-[13px] text-gray-body font-medium">${LANG.subtotal}</span>
    //                             <span class="font-bold text-[16px] dropdown-cart-total">0</span>
    //                         </div>
    //                         <div class="flex gap-2">
    //                             <a href="cart.html" class="flex-1 h-[38px] flex items-center justify-center bg-white border border-gray-border rounded-md text-[13px] font-medium hover:bg-gray-50 transition-colors">${LANG.viewCart}</a>
    //                             <a href="checkout.html" class="flex-1 h-[38px] flex items-center justify-center bg-primary text-white rounded-md text-[13px] font-medium hover:bg-[#C4182A] transition-colors shadow-sm">${LANG.checkout}</a>
    //                         </div>
    //                     </div>
    //                 </div>
    //             </div>
    //         </div>
    //     </div>
    // </div>
    // <nav class="bg-white sticky top-0 z-40 h-[64px] border-b border-gray-border shadow-sm hidden lg:flex items-center" id="mainNav">
    //     <div class="max-w-[1280px] w-full mx-auto px-6 md:px-10 flex justify-between items-center text-[14px]">
    //         <div class="flex items-center gap-6">
    //             <a href="index.html" class="flex items-center shrink-0">
    //                 <img src="${assetPath}assets/images/logo.jpeg" alt="ATS" class="h-10 rounded">
    //             </a>
    //             <div class="hidden lg:flex items-center gap-8 font-medium">
    //                 <a href="index.html" class="${activeClass(['index.html', '/'])} transition-colors">${LANG.home}</a>
    //                 <a href="catalog.html" class="${activeClass(['catalog.html', 'product.html'])} transition-colors">${LANG.products}</a>
    //                 <a href="solutions.html" class="${activeClass(['solutions.html'])} transition-colors">${LANG.solutions}</a>
    //                 <a href="services.html" class="${activeClass(['services.html'])} transition-colors">${LANG.services}</a>
    //                 <a href="about.html" class="${activeClass(['about.html'])} transition-colors">${LANG.about}</a>
    //             </div>
    //         </div>
            
    //         <div class="flex items-center gap-4 text-[14px]">
    //             <span class="hidden lg:block text-gray-body font-medium">${LANG.support}</span>
    //             <div class="hidden lg:block w-px h-4 bg-gray-border"></div>
    //             <a href="tel:16000" class="hidden lg:flex items-center gap-1.5 font-bold text-primary"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"/></svg> ${isArabic ? '١٦٠٠٠' : '+20 123 456 7890'}</a>
    //         </div>
    //     </div>
    // </nav>
    // <header class="flex lg:hidden bg-white border-b border-gray-border h-[60px] sticky top-0 z-50 px-4 items-center justify-between" id="mobileHeader">
    //     <div class="flex items-center gap-3">
    //         <a href="index.html" class="flex items-center">
    //             <img src="${assetPath}assets/images/logo.jpeg" alt="ATS" class="h-8 rounded">
    //         </a>
    //     </div>
    //     <div class="flex items-center gap-4">
    //         <button class="text-gray-body hover:text-dark"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg></button>
    //         <a href="${LANG.langLink}" class="text-gray-body hover:text-dark flex items-center gap-1">
    //             <span class="text-[12px] font-bold">${LANG.langShort}</span>
    //         </a>
    //     </div>
    // </header>
    //     `;
    //     headerEl.innerHTML = html;
    // }

    // function injectFooterNav() {
    //     const footerNavEl = document.getElementById('site-footer-nav');
    //     if (!footerNavEl) return;

    //     const drawerTransform = isRtl ? '-translate-x-full' : 'translate-x-full';
    //     const drawerClass = isRtl ? 'left-0' : 'right-0';

    //     const html = `
    // <div id="drawerOverlay" class="fixed inset-0 bg-dark/50 backdrop-blur-sm z-[100] hidden transition-opacity duration-300"></div>
    // <div id="mobileDrawer" class="fixed top-0 ${drawerClass} w-[312px] h-full bg-white z-[101] shadow-2xl transition-transform duration-300 transform ${drawerTransform} flex flex-col">
    //     <div class="p-6 border-b border-gray-border flex justify-between items-center bg-gray-light/30">
    //         <div class="flex items-center gap-3">
    //             <a href="index.html" class="flex items-center"><img src="${assetPath}assets/images/logo.jpeg" alt="ATS" class="h-10 rounded"></a>
    //         </div>
    //         <button id="closeDrawerBtn" class="w-10 h-10 rounded-full flex items-center justify-center text-gray-body hover:bg-white hover:text-primary transition-all">
    //             <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    //         </button>
    //     </div>
    //     <div class="flex-1 overflow-y-auto py-8">
    //         <nav class="px-6 space-y-1">
    //             <a href="index.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['index.html', '/'])} ${activeClass(['index.html', '/']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
    //                 <span>${LANG.home}</span>
    //             </a>
    //             <a href="catalog.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['catalog.html'])} ${activeClass(['catalog.html']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
    //                 <span>${LANG.products}</span>
    //             </a>
    //             <a href="solutions.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['solutions.html'])} ${activeClass(['solutions.html']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
    //                 <span>${LANG.solutions}</span>
    //             </a>
    //             <a href="services.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['services.html'])} ${activeClass(['services.html']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"/><path d="M12 12V8"/></svg>
    //                 <span>${LANG.services}</span>
    //             </a>
    //             <div class="h-px bg-gray-border/50 my-4 mx-4"></div>
    //             <a href="about.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['about.html'])} ${activeClass(['about.html']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>
    //                 <span>${LANG.about}</span>
    //             </a>
    //             <a href="contact.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['contact.html'])} ${activeClass(['contact.html']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
    //                 <span>${LANG.contact}</span>
    //             </a>
    //             <a href="account.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['account.html'])} ${activeClass(['account.html']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21a8 8 0 0 0-16 0"/><circle cx="12" cy="7" r="4"/></svg>
    //                 <span>${LANG.myAccount}</span>
    //             </a>
    //             <a href="orders.html" class="flex items-center gap-4 py-4 px-4 rounded-xl ${activeClass(['orders.html', 'order-detail.html', 'tracking.html'])} ${activeClass(['orders.html', 'order-detail.html', 'tracking.html']) === 'text-primary' ? 'bg-red-50 font-bold' : 'hover:bg-gray-50'} transition-all">
    //                 <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>
    //                 <span>${LANG.myOrders}</span>
    //             </a>
    //         </nav>
    //     </div>
    //     <div class="p-8 border-t border-gray-border bg-gray-light/30">
    //         <a href="contact.html" class="block w-full bg-primary text-white text-center py-4 rounded-2xl font-bold shadow-lg shadow-primary/20 hover:scale-95 transition-transform">
    //             ${LANG.quote}
    //         </a>
    //     </div>
    // </div>
    // <nav class="lg:hidden fixed bottom-1 left-4 right-4 bg-white/95 backdrop-blur-md h-[55px] border border-gray-border rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.12)] z-[60] flex items-center justify-around px-2" id="bottomTabBar">
    //     <a href="index.html" class="flex flex-col items-center gap-0.5 ${activeClass(['index.html', '/'])}">
    //         <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
    //         <span class="text-[9px] font-bold">${LANG.home}</span>
    //     </a>
    //     <a href="catalog.html" class="flex flex-col items-center gap-0.5 ${activeClass(['catalog.html', 'product.html'])}">
    //         <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
    //         <span class="text-[9px] font-bold">${LANG.products}</span>
    //     </a>
    //     <a href="solutions.html" class="flex flex-col items-center gap-0.5 ${activeClass(['solutions.html'])}">
    //         <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
    //         <span class="text-[9px] font-bold">${LANG.solutions}</span>
    //     </a>
    //     <a href="services.html" class="flex flex-col items-center gap-0.5 ${activeClass(['services.html'])}">
    //         <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="16" y="16" width="6" height="6" rx="1"/><rect x="2" y="16" width="6" height="6" rx="1"/><rect x="9" y="2" width="6" height="6" rx="1"/><path d="M5 16v-3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3"/><path d="M12 12V8"/></svg>
    //         <span class="text-[9px] font-bold">${LANG.services}</span>
    //     </a>
    //     <a href="cart.html" class="flex flex-col items-center gap-0.5 ${activeClass(['cart.html'])}">
    //         <div class="relative">
    //             <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
    //             <span class="absolute -top-1.5 -right-1.5 bg-primary text-white text-[8px] w-3.5 h-3.5 rounded-full flex items-center justify-center font-bold dropdown-cart-count">0</span>
    //         </div>
    //         <span class="text-[9px] font-bold">${LANG.cart}</span>
    //     </a>
    //     <button id="mobileMenuBtn" class="flex flex-col items-center gap-0.5 text-gray-body">
    //         <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
    //         <span class="text-[9px] font-bold">${LANG.menu}</span>
    //     </button>
    // </nav>
    // <div class="lg:hidden h-[72px]"></div>
    //     `;
    //     footerNavEl.innerHTML = html;
    // }

    // injectHeader();
    // injectFooterNav();
})();
