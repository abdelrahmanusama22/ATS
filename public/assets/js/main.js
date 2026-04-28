// ═══════════════════════════════════════════════════════════════
// ATS Enterprise — Main Application Controller
// Version 2.0 | Professional Rewrite
// ═══════════════════════════════════════════════════════════════

(function () {
    'use strict';

    // ─── Utility Helpers ──────────────────────────────────────
    const $ = (sel, ctx = document) => ctx.querySelector(sel);
    const $$ = (sel, ctx = document) => [...ctx.querySelectorAll(sel)];
    const on = (el, evt, fn, opts) => el?.addEventListener(evt, fn, opts);
    const isArabic = document.documentElement.lang === 'ar';

    // Front-end analytics hook: emits events for optional GTM/dataLayer integration.
    const trackCommerceEvent = (eventName, payload = {}) => {
        const detail = { event: eventName, locale: isArabic ? 'ar' : 'en', ...payload };
        window.dispatchEvent(new CustomEvent('atsCommerceEvent', { detail }));
        if (Array.isArray(window.dataLayer)) {
            window.dataLayer.push(detail);
        }
    };

    const LANG = {
        cartEmpty:   isArabic ? 'سلة التسوق فارغة'               : 'Your cart is empty',
        items:       isArabic ? 'منتجات'                          : 'Items',
        subtotal:    isArabic ? 'المجموع الفرعي'                  : 'Subtotal',
        viewCart:    isArabic ? 'عرض السلة'                       : 'View Cart',
        checkout:    isArabic ? 'إتمام الشراء'                    : 'Checkout',
        currency:    isArabic ? 'ج.م'                             : 'EGP',
        addedToCart:  isArabic ? 'تمت الإضافة إلى السلة!'         : 'Added to cart!',
        noAddMore:   isArabic ? 'يبدو أنك لم تضف أي منتجات بعد.' : "Looks like you haven't added anything yet.",
        startShop:   isArabic ? 'ابدأ التسوق'                     : 'Start Shopping',
        msgSent:     isArabic ? 'تم إرسال رسالتك بنجاح!'          : 'Message sent successfully!',
    };

    // ─── 1. NAVIGATION MODULE ─────────────────────────────────
    const Navigation = {
        init() {
            this.stickyNav();
            this.highlightActivePage();
        },

        stickyNav() {
            const nav = $('#mainNav');
            if (!nav) return;
            let ticking = false;
            on(window, 'scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        nav.classList.toggle('shadow-md', window.scrollY > 10);
                        ticking = false;
                    });
                    ticking = true;
                }
            });
        },

        highlightActivePage() {
            const path = window.location.pathname.split('/').pop() || 'index.html';
            $$('nav a[href]').forEach(link => {
                const href = link.getAttribute('href').split('/').pop();
                if (href === path) {
                    link.classList.remove('text-gray-body');
                    link.classList.add('text-primary');
                } else if (!link.closest('[class*="group/cart"]')) {
                    link.classList.remove('text-primary');
                }
            });
        }
    };

    // ─── 2. ANIMATIONS MODULE ─────────────────────────────────
    const Animations = {
        init() {
            this.pageLoadFade();
            this.scrollReveal();
            this.counterAnimation();
            this.staggerCards();
        },

        pageLoadFade() {
            document.body.style.opacity = '0';
            document.body.style.transition = 'opacity 0.4s ease';
            requestAnimationFrame(() => {
                document.body.style.opacity = '1';
            });
        },

        scrollReveal() {
            const targets = $$('section, .animate-on-scroll');
            if (!targets.length) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateY(0)';
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.08, rootMargin: '0px 0px -40px 0px' });

            targets.forEach(el => {
                // Skip nav and top bar from animating
                if (el.tagName === 'NAV' || el.classList.contains('sticky')) return;
                // Only apply to sections that aren't already in view
                const rect = el.getBoundingClientRect();
                if (rect.top > window.innerHeight * 0.5) {
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(24px)';
                    el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    observer.observe(el);
                }
            });
        },

        counterAnimation() {
            const counters = $$('[data-counter]');
            if (!counters.length) return;

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this._animateCounter(entry.target);
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.5 });

            counters.forEach(el => observer.observe(el));
        },

        _animateCounter(el) {
            const text = el.textContent.trim();
            const hasPlus = text.includes('+');
            const hasPercent = text.includes('%');
            const hasSlash = text.includes('/');

            if (hasSlash) return; // Skip "24/7"

            const numericPart = parseFloat(text.replace(/[^0-9.]/g, ''));
            if (isNaN(numericPart)) return;

            const duration = 1800;
            const start = performance.now();

            const step = (now) => {
                const elapsed = now - start;
                const progress = Math.min(elapsed / duration, 1);
                // Ease out cubic
                const eased = 1 - Math.pow(1 - progress, 3);
                const current = (eased * numericPart);

                let display;
                if (hasPercent) {
                    display = current.toFixed(1) + '%';
                } else {
                    display = Math.floor(current).toString();
                }
                if (hasPlus) display += '+';

                el.textContent = display;

                if (progress < 1) {
                    requestAnimationFrame(step);
                }
            };

            el.textContent = hasPercent ? '0.0%' : '0';
            requestAnimationFrame(step);
        },

        staggerCards() {
            const grids = $$('.grid');
            grids.forEach(grid => {
                const cards = $$('.hover-lift, .bg-white.border', grid);
                if (cards.length < 2) return;

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const siblings = $$('.hover-lift, .bg-white.border', grid);
                            siblings.forEach((card, i) => {
                                card.style.opacity = '0';
                                card.style.transform = 'translateY(16px)';
                                card.style.transition = `opacity 0.5s ease ${i * 0.08}s, transform 0.5s ease ${i * 0.08}s`;
                                requestAnimationFrame(() => {
                                    card.style.opacity = '1';
                                    card.style.transform = 'translateY(0)';
                                });
                            });
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.1 });

                observer.observe(grid);
            });
        }
    };

    // ─── 3. TOAST NOTIFICATION ────────────────────────────────
    const Toast = {
        _container: null,

        _getContainer() {
            if (!this._container) {
                this._container = document.createElement('div');
                this._container.id = 'toast-container';
                Object.assign(this._container.style, {
                    position: 'fixed',
                    top: '80px',
                    right: isArabic ? 'auto' : '24px',
                    left: isArabic ? '24px' : 'auto',
                    zIndex: '9999',
                    display: 'flex',
                    flexDirection: 'column',
                    gap: '8px',
                    pointerEvents: 'none',
                });
                document.body.appendChild(this._container);
            }
            return this._container;
        },

        show(message, type = 'success') {
            const toast = document.createElement('div');
            const colors = {
                success: { bg: '#059669', icon: '✓' },
                error:   { bg: '#DC2626', icon: '✕' },
                info:    { bg: '#2563EB', icon: 'ℹ' },
            };
            const { bg, icon } = colors[type] || colors.success;

            toast.innerHTML = `
                <div style="display:flex;align-items:center;gap:10px;padding:12px 20px;background:${bg};color:white;border-radius:10px;font-size:14px;font-weight:500;box-shadow:0 8px 24px rgba(0,0,0,0.15);pointer-events:auto;transform:translateX(${isArabic ? '-' : ''}100%);opacity:0;transition:transform 0.35s cubic-bezier(0.16,1,0.3,1),opacity 0.35s ease;font-family:Inter,Cairo,sans-serif;">
                    <span style="font-size:16px;line-height:1;">${icon}</span>
                    <span>${message}</span>
                </div>
            `;

            this._getContainer().appendChild(toast);
            const inner = toast.firstElementChild;

            requestAnimationFrame(() => {
                inner.style.transform = 'translateX(0)';
                inner.style.opacity = '1';
            });

            setTimeout(() => {
                inner.style.transform = `translateX(${isArabic ? '-' : ''}100%)`;
                inner.style.opacity = '0';
                setTimeout(() => toast.remove(), 400);
            }, 2800);
        }
    };

    // ─── 4. CART SERVICE + RENDER LAYERS (Simple In-File Refactor) ───────
    const CartService = {
        load() {
            return JSON.parse(localStorage.getItem('ats_cart_data')) || [];
        },

        save(data) {
            localStorage.setItem('ats_cart_data', JSON.stringify(data || []));
        },

        getTotals(data) {
            let qty = 0;
            let price = 0;
            (data || []).forEach(item => {
                qty += item.qty;
                price += item.price * item.qty;
            });
            return { qty, price };
        },

        sanitizeQty(rawQty) {
            const qty = parseInt(rawQty, 10);
            return Number.isFinite(qty) && qty > 0 ? qty : 1;
        },

        normalizeImagePath(img) {
            if (!img) return '';
            return String(img).replace(/^(\.\.\/|\/)+/, '');
        }
    };

    const CartRenderer = {
        getCorrectImagePath(img, localeIsArabic) {
            if (!img) return '';
            if (img.startsWith('http') || img.startsWith('data:')) return img;
            const cleanPath = String(img).replace(/^(\.\.\/|\/)+/, '');
            return localeIsArabic ? `../${cleanPath}` : cleanPath;
        },

        formatPrice(p, localeIsArabic, currencyLabel) {
            return localeIsArabic
                ? `${p.toLocaleString()} <span class="text-[12px] font-normal">${currencyLabel}</span>`
                : `${currencyLabel} ${p.toLocaleString()}`;
        }
    };

    // ─── 4. CART MODULE ───────────────────────────────────────
    const Cart = {
        data: [],

        getCorrectImagePath(img) {
            return CartRenderer.getCorrectImagePath(img, isArabic);
        },

        init() {
            this.data = CartService.load();
            this.save();
            this.renderDropdown();
            this.renderFullCart();
            this.bindAddToCartButtons();
            this.listenForUpdates();
        },

        save() {
            CartService.save(this.data);
        },

        getTotals() {
            return CartService.getTotals(this.data);
        },

        formatPrice(p) {
            return CartRenderer.formatPrice(p, isArabic, LANG.currency);
        },

        sanitizeQty(rawQty) {
            return CartService.sanitizeQty(rawQty);
        },

        addItem(product) {
            // Normalize image path: always store relative to project root (no ../)
            const itemToSave = { ...product };
            const requestedQty = this.sanitizeQty(itemToSave.qty);
            if (itemToSave.image) {
                itemToSave.image = CartService.normalizeImagePath(itemToSave.image);
            }

            const existing = this.data.find(i => i.id === itemToSave.id || i.name === itemToSave.name);
            if (existing) {
                existing.qty += requestedQty;
            } else {
                this.data.push({ ...itemToSave, qty: requestedQty });
            }
            this.save();
            this.renderDropdown();
            this.renderFullCart();
            this.bounceBadge();
            Toast.show(LANG.addedToCart, 'success');
            trackCommerceEvent('add_to_cart', {
                item_id: itemToSave.id || itemToSave.name,
                item_name: itemToSave.name,
                price: itemToSave.price || 0,
                quantity: requestedQty,
            });
            window.dispatchEvent(new Event('cartUpdated'));
        },

        removeItem(index) {
            this.data.splice(index, 1);
            this.save();
            this.renderDropdown();
            this.renderFullCart();
        },

        updateQty(index, delta) {
            if (this.data[index]) {
                this.data[index].qty = Math.max(1, this.data[index].qty + delta);
                this.save();
                this.renderDropdown();
                this.renderFullCart();
            }
        },

        bounceBadge() {
            $$('.dropdown-cart-count').forEach(badge => {
                badge.style.transition = 'transform 0.3s cubic-bezier(0.34,1.56,0.64,1)';
                badge.style.transform = 'scale(1.5)';
                setTimeout(() => { badge.style.transform = 'scale(1)'; }, 300);
            });
        },

        renderDropdown() {
            const containers = $$('.dropdown-cart-items');
            const badges     = $$('.dropdown-cart-count');
            const countTexts = $$('.dropdown-cart-count-text');
            const totals     = $$('.dropdown-cart-total');
            if (!containers.length) return;

            const { qty, price } = this.getTotals();

            let html = '';
            if (this.data.length === 0) {
                html = `<div class="py-8 text-center text-gray-body text-[13px]">${LANG.cartEmpty}</div>`;
            } else {
                this.data.forEach((item, i) => {
                    html += `
                    <div class="flex gap-3 items-center" style="animation:fadeSlideIn 0.3s ease ${i * 0.05}s both;">
                        <div class="w-[50px] h-[50px] border border-gray-border rounded-md overflow-hidden shrink-0 bg-white p-1">
                            <img src="${this.getCorrectImagePath(item.image)}" alt="${item.name}" class="w-full h-full object-contain">
                        </div>
                        <div class="flex-1 min-w-0">
                            <a href="product.html" class="font-bold text-[13px] text-dark hover:text-primary truncate block transition-colors">${item.name}</a>
                            <div class="flex items-center justify-between mt-0.5">
                                <span class="text-[12px] text-gray-body">${item.qty} × ${LANG.currency} ${item.price.toLocaleString()}</span>
                                <button class="text-gray-body hover:text-primary p-1 transition-colors cart-dropdown-remove" data-idx="${i}">
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6 6 18M6 6l12 12"/></svg>
                                </button>
                            </div>
                        </div>
                    </div>`;
                });
            }

            containers.forEach(c => {
                c.innerHTML = html;
                $$('.cart-dropdown-remove', c).forEach(btn => {
                    on(btn, 'click', (e) => { e.preventDefault(); e.stopPropagation(); this.removeItem(+btn.dataset.idx); });
                });
            });

            badges.forEach(b => { if (b) b.textContent = qty; });
            countTexts.forEach(t => { if (t) t.textContent = qty; });
            totals.forEach(t => { if (t) t.innerHTML = this.formatPrice(price); });
        },

        
        renderFullCart() {
            const container = $('#full-cart-items');
            if (!container) return;

            const subtotalEl = $('#cart-subtotal');
            const totalEl = $('#cart-total');
            const countEl = $('#cart-count-text');

            if (this.data.length === 0) {
                container.innerHTML = `
                    <div class="p-16 text-center">
                        <div class="bg-gray-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2"><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/><path d="M1 1h4l2.68 13.39a2 2 0 002 1.61h9.72a2 2 0 002-1.61L23 6H6"/></svg>
                        </div>
                        <p class="text-gray-500 font-medium">${isArabic ? 'سلة التسوق فارغة' : 'Your cart is empty'}</p>
                        <a href="catalog.html" class="inline-block mt-4 text-primary font-bold hover:underline">${isArabic ? 'تصفح المنتجات' : 'Browse Products'}</a>
                    </div>`;
                if (subtotalEl) subtotalEl.textContent = `${LANG.currency} 0`;
                if (totalEl) totalEl.textContent = `${LANG.currency} 0`;
                return;
            }

            let html = '';
            let price = 0;
            let qty = 0;

            this.data.forEach((item, i) => {
                price += item.price * item.qty;
                qty += item.qty;

                // Responsive Item Layout (Card on mobile, Row on desktop)
                html += `
                <div class="p-4 lg:p-6 border-b border-gray-border last:border-0 hover:bg-gray-50/50 transition-colors flex flex-col lg:grid lg:grid-cols-[3fr_1fr_1.5fr_1fr_auto] gap-4 lg:items-center relative text-dark">
                    <!-- Product Info Area -->
                    <div class="flex items-center gap-4">
                        <div class="w-20 h-20 bg-gray-100 rounded-xl overflow-hidden flex-shrink-0 border border-gray-border">
                            <img src="${this.getCorrectImagePath(item.image)}" alt="${item.name}" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-[14px] lg:text-[15px] leading-snug hover:text-primary transition-colors cursor-pointer">${item.name}</h3>
                            <div class="lg:hidden mt-1 text-[13px] text-gray-body font-normal">${LANG.currency} ${item.price.toLocaleString()}</div>
                        </div>
                        
                        <button class="lg:hidden absolute top-4 right-4 w-8 h-8 flex items-center justify-center text-gray-body/50 hover:text-primary transition-all cart-remove-full" data-idx="${i}">
                           <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M18 6L6 18M6 6l12 12"/></svg>
                        </button>
                    </div>

                    <div class="hidden lg:block text-center text-[14px] text-gray-body font-medium">${LANG.currency} ${item.price.toLocaleString()}</div>
                    
                    <div class="flex items-center justify-between lg:justify-center gap-4">
                        <span class="lg:hidden text-[13px] text-gray-body font-medium">Quantity:</span>
                        <div class="flex items-center border border-gray-border rounded-lg w-[110px] h-[38px] bg-white shadow-sm overflow-hidden">
                            <button class="w-9 h-full flex items-center justify-center text-gray-body hover:text-primary hover:bg-gray-100 transition-colors cart-qty" data-idx="${i}" data-delta="-1">−</button>
                            <input type="text" value="${item.qty}" class="w-full h-full text-center text-[14px] font-bold text-dark border-x border-gray-border focus:outline-none bg-transparent" readonly>
                            <button class="w-9 h-full flex items-center justify-center text-gray-body hover:text-primary hover:bg-gray-100 transition-colors cart-qty" data-idx="${i}" data-delta="1">+</button>
                        </div>
                    </div>

                    <div class="flex lg:grid lg:text-right items-center justify-between lg:justify-end">
                        <span class="lg:hidden text-[13px] text-gray-body font-medium">${LANG.subtotal}:</span>
                        <div class="font-bold text-[16px] text-primary">${LANG.currency} ${(item.price * item.qty).toLocaleString()}</div>
                    </div>

                    <div class="hidden lg:flex justify-end">
                        <button class="w-8 h-8 flex items-center justify-center text-gray-body/50 hover:text-primary hover:bg-red-50 rounded-full transition-all cart-remove-full" data-idx="${i}">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 6V4a2 2 0 0 0-2-2H7a2 2 0 0 0-2 2v2M3 6h18M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/></svg>
                        </button>
                    </div>
                </div>`;
            });

            container.innerHTML = html;

            if (subtotalEl) subtotalEl.textContent = `${LANG.currency} ${price.toLocaleString()}`;
            if (totalEl) totalEl.textContent = `${LANG.currency} ${price.toLocaleString()}`;
            if (countEl) countEl.textContent = `${qty} ${isArabic ? 'عناصر' : 'Items'}`;

            $$('.cart-qty', container).forEach(btn => {
                on(btn, 'click', () => this.updateQty(+btn.dataset.idx, +btn.dataset.delta));
            });
            $$('.cart-remove-full', container).forEach(btn => {
                on(btn, 'click', () => this.removeItem(+btn.dataset.idx));
            });
        },

        bindAddToCartButtons() {
            // Handle product card navigation (cards are now <div data-href>)
            $$('.product-card[data-href], [data-href]').forEach(card => {
                on(card, 'click', (e) => {
                    // Don't navigate if clicking a button or interactive element
                    if (e.target.closest('.add-to-cart-btn') || e.target.closest('button')) return;
                    const href = card.dataset.href;
                    if (href) window.location.href = href;
                });
            });

            // Bind add-to-cart buttons
            $$('.add-to-cart-btn').forEach(btn => {
                on(btn, 'click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();

                    let requestedQty = 1;
                    if (btn.dataset.usePageQty === 'true') {
                        const qtyInput = $('#product-qty-input');
                        if (qtyInput) {
                            requestedQty = this.sanitizeQty(qtyInput.value);
                        }
                    }

                    const product = {
                        id:    parseInt(btn.dataset.id) || Date.now(),
                        name:  btn.dataset.name || 'Product',
                        price: parseInt(btn.dataset.price) || 0,
                        image: btn.dataset.image || '',
                        qty: requestedQty,
                    };

                    this.addItem(product);

                    // Visual feedback on button
                    const original = btn.innerHTML;
                    btn.innerHTML = '<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#059669" stroke-width="2.5"><polyline points="20 7.5 9 18.5 4 13.5"/></svg>';
                    btn.style.borderColor = '#059669';
                    setTimeout(() => { btn.innerHTML = original; btn.style.borderColor = ''; }, 1200);
                });
            });
        },

        listenForUpdates() {
            on(window, 'storage', (e) => {
                if (e.key === 'ats_cart_data') {
                    this.data = JSON.parse(e.newValue) || [];
                    this.renderDropdown();
                    this.renderFullCart();
                }
            });
            on(window, 'cartUpdated', () => {
                this.renderDropdown();
                this.renderFullCart();
            });
        }
    };

    // Expose globally for inline usage
    window.addToCart = (product) => Cart.addItem(product);

    const FormsService = {
        emailRegex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,

        isRequiredFieldValid(field) {
            return !!field?.value?.trim();
        },

        isEmailFieldValid(field) {
            const value = field?.value?.trim() || '';
            if (!value) return false;
            return this.emailRegex.test(value);
        },

        ensureFieldError(field, message) {
            const wrapper = field?.closest('div');
            if (!wrapper || wrapper.querySelector('.field-error')) return;
            const err = document.createElement('p');
            err.className = 'field-error text-red-500 text-[12px] mt-1';
            err.textContent = message;
            wrapper.appendChild(err);
        },

        clearFieldError(field) {
            const wrapper = field?.closest('div');
            const err = wrapper?.querySelector('.field-error');
            if (err) err.remove();
            field?.classList.remove('border-red-500', 'ring-2', 'ring-red-200');
        },

        markFieldInvalid(field, message) {
            field.classList.add('border-red-500', 'ring-2', 'ring-red-200');
            this.ensureFieldError(field, message);
        }
    };

    // ─── 5. FORMS MODULE ──────────────────────────────────────
    const Forms = {
        init() {
            this.contactForm();
            this.shippingToggle();
            this.paymentToggle();
        },

        contactForm() {
            const form = $('#contactForm');
            if (!form) return;

            const submitBtn = $('button[type="submit"]', form);
            const originalBtnHTML = submitBtn ? submitBtn.innerHTML : '';

            on(form, 'submit', (e) => {
                e.preventDefault();
                const required = $$('[required]', form);
                let valid = true;

                required.forEach(field => {
                    if (!FormsService.isRequiredFieldValid(field)) {
                        FormsService.markFieldInvalid(field, isArabic ? 'هذا الحقل مطلوب' : 'This field is required');
                        valid = false;
                    } else if (field.type === 'email' && field.value.trim()) {
                        if (!FormsService.isEmailFieldValid(field)) {
                            FormsService.markFieldInvalid(field, isArabic ? 'يرجى إدخال بريد إلكتروني صالح' : 'Please enter a valid email address');
                            valid = false;
                        } else {
                            FormsService.clearFieldError(field);
                        }
                    } else {
                        FormsService.clearFieldError(field);
                    }
                });

                if (valid) {
                    // Show loading state
                    if (submitBtn) {
                        submitBtn.disabled = true;
                        submitBtn.innerHTML = `<svg class="animate-spin" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83"/></svg> ${isArabic ? 'جاري الإرسال...' : 'Sending...'}`;
                        submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
                    }
                    setTimeout(() => {
                        Toast.show(LANG.msgSent, 'success');
                        form.reset();
                        if (submitBtn) {
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnHTML;
                            submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                        }
                    }, 800);
                }
            });

            // Clear error styling on input
            $$('input, textarea', form).forEach(field => {
                on(field, 'input', () => {
                    FormsService.clearFieldError(field);
                });
            });
        },

        shippingToggle() {
            $$('.shipping-option, .shipping-method').forEach(option => {
                on(option, 'click', () => {
                    $$('.shipping-option, .shipping-method').forEach(o => {
                        o.classList.remove('shipping-active', 'active');
                        o.style.border = '';
                        o.style.backgroundColor = '';
                        // Remove checkmark safely based on class
                        const check = o.querySelector('.shipping-check');
                        if (check) check.remove();
                    });
                    option.classList.add('active');
                    option.style.border = '2px solid #E21D2E';
                    option.style.backgroundColor = '#FFFFFF';

                    // Add checkmark dynamically without assuming absolute string layout
                    if (!option.querySelector('.shipping-check')) {
                        const checkEl = document.createElement('div');
                        const sidePos = isArabic ? 'left-4' : 'right-4';
                        checkEl.className = `absolute ${sidePos} top-1/2 -translate-y-1/2 text-primary shipping-check`;
                        checkEl.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
                        option.appendChild(checkEl);
                    }
                });
            });
        },

        paymentToggle() {
            $$('.payment-option').forEach(option => {
                on(option, 'click', () => {
                    $$('.payment-option').forEach(o => o.classList.remove('payment-active'));
                    option.classList.add('payment-active');
                });
            });
        }
    };

    const ProductService = {
        sanitizeQty(value) {
            const qty = parseInt(value, 10);
            return Number.isFinite(qty) && qty > 0 ? qty : 1;
        },

        nextQty(current, delta) {
            const base = this.sanitizeQty(current);
            return Math.max(1, base + delta);
        },

        applyThumbState(thumbs, activeThumb) {
            thumbs.forEach(t => t.classList.remove('thumb-active', 'ring-2', 'ring-primary'));
            activeThumb.classList.add('thumb-active', 'ring-2', 'ring-primary');
        }
    };

    // ─── 6. PRODUCT MODULE ────────────────────────────────────
    const Product = {
        init() {
            this.gallery();
            this.quantity();
            this.tabs();
        },

        gallery() {
            const main = $('#mainProductImage');
            const thumbs = $$('.product-thumb');
            if (!main || !thumbs.length) return;

            thumbs.forEach(thumb => {
                on(thumb, 'click', () => {
                    ProductService.applyThumbState(thumbs, thumb);
                    // Smooth image transition
                    main.style.opacity = '0';
                    setTimeout(() => {
                        main.src = thumb.dataset.src || thumb.src;
                        main.style.opacity = '1';
                    }, 200);
                });
            });
            main.style.transition = 'opacity 0.2s ease';
        },

        quantity() {
            const minus = $('#qtyMinus') || $('#product-qty-minus');
            const plus  = $('#qtyPlus') || $('#product-qty-plus');
            const input = $('#qtyInput') || $('#product-qty-input');
            if (!minus || !plus || !input) return;

            on(minus, 'click', () => {
                input.value = ProductService.nextQty(input.value, -1);
            });
            on(plus, 'click', () => {
                input.value = ProductService.nextQty(input.value, 1);
            });
        },

        tabs() {
            const btns = $$('.tab-btn');
            const panels = $$('.tab-panel, [id^="tab-"]');
            if (!btns.length || !panels.length) return;

            // Set initial state: hide non-active panels
            panels.forEach(p => {
                // For AR pages that use 'hidden' class, respect existing state
                if (p.classList.contains('hidden')) {
                    p.style.display = 'none';
                    p.classList.remove('hidden');
                } else if (!p.classList.contains('tab-panel-active')) {
                    p.style.display = 'none';
                }
            });

            btns.forEach(btn => {
                on(btn, 'click', () => {
                    let target = btn.dataset.tab;
                    // Normalize: ensure target starts with 'tab-'
                    if (!target.startsWith('tab-')) target = 'tab-' + target;

                    // Update button styles
                    btns.forEach(b => {
                        b.classList.remove('tab-active', 'text-dark', 'border-primary', 'text-primary', 'bg-white', 'font-bold');
                        b.classList.add('text-gray-body', 'border-transparent', 'font-medium');
                        b.style.borderBottomColor = '';
                    });
                    btn.classList.add('tab-active', 'text-dark', 'border-primary', 'font-bold');
                    btn.classList.remove('text-gray-body', 'border-transparent', 'font-medium');

                    // Update panels
                    panels.forEach(p => {
                        if (p.id === target) {
                            p.style.display = '';
                            p.style.opacity = '0';
                            requestAnimationFrame(() => { p.style.transition = 'opacity 0.3s ease'; p.style.opacity = '1'; });
                        } else {
                            p.style.display = 'none';
                        }
                    });
                });
            });
        }
    };

    const CatalogService = {
        writeStateToURL(activeBrands, activeCategories, minSlider, maxSlider, sortSelect) {
            const params = new URLSearchParams(window.location.search);

            if (activeBrands.size) params.set('brands', [...activeBrands].join('|'));
            else params.delete('brands');

            if (activeCategories.size) params.set('categories', [...activeCategories].join('|'));
            else params.delete('categories');

            if (minSlider && minSlider.value) params.set('min', minSlider.value);
            else params.delete('min');

            if (maxSlider && maxSlider.value) params.set('max', maxSlider.value);
            else params.delete('max');

            if (sortSelect && sortSelect.value) params.set('sort', sortSelect.value);
            else params.delete('sort');

            const query = params.toString();
            const next = `${window.location.pathname}${query ? `?${query}` : ''}${window.location.hash}`;
            window.history.replaceState(null, '', next);
        },

        readStateFromURL() {
            const params = new URLSearchParams(window.location.search);
            return {
                brands: (params.get('brands') || '').split('|').filter(Boolean),
                categories: (params.get('categories') || '').split('|').filter(Boolean),
                min: params.get('min'),
                max: params.get('max'),
                sort: params.get('sort')
            };
        }
    };

    // ─── 7. CATALOG MODULE ────────────────────────────────────
    const Catalog = {
        activeBrands: new Set(),
        activeCategories: new Set(),

        init() {
            if (!$('aside') && !$('#filterDrawer')) return;
            this.initMobileDrawer();
            this.filterCheckboxes();
            this.clearAllBtn();
            this.filterTags();
            this.sortDropdown();
            this.pagination();
            this.priceRange();
            this.sortSync();
            this.restoreStateFromURL();
            this.validateProductContract();
            this.updateFilterTags();
            this.filterProducts();
        },

        getProductsForContractValidation() {
            return $$('.product-card').map(card => {
                const actionBtn = $('.add-to-cart-btn', card);
                const title = $('h3', card);
                const imageEl = $('img', card);
                const stockEl = $('.border-t', card);
                const rawId = actionBtn?.dataset.id || card.dataset.id || '';
                const parsedId = Number.parseInt(rawId, 10);
                const id = Number.isFinite(parsedId) ? parsedId : rawId;
                const baseRoute = (card.dataset.href || 'product.html').replace(/^\/+/, '').replace(/^(\.\.\/)+/, '');
                const detailPageEN = baseRoute.startsWith('ar/') ? baseRoute.replace(/^ar\//, '') : baseRoute;
                const detailPageAR = detailPageEN.startsWith('ar/') ? detailPageEN : `ar/${detailPageEN}`;
                const productName = actionBtn?.dataset.name || title?.textContent?.trim() || '';
                const category = card.dataset.category || '';
                const stockText = stockEl?.textContent?.trim() || '';

                return {
                    id,
                    sku: rawId ? `ATS-${rawId}` : '',
                    name_en: productName,
                    name_ar: productName,
                    brand: card.dataset.brand || '',
                    category_en: category,
                    category_ar: category,
                    price: Number.parseInt(card.dataset.price || actionBtn?.dataset.price || '0', 10),
                    stockLabel_en: stockText,
                    stockLabel_ar: stockText,
                    image: (actionBtn?.dataset.image || imageEl?.getAttribute('src') || '').replace(/^(\.\.\/)+/, ''),
                    detailPage_en: detailPageEN,
                    detailPage_ar: detailPageAR,
                };
            });
        },

        matchesContractType(value, expectedType) {
            const allowedTypes = (expectedType || '').split('|').map(t => t.trim()).filter(Boolean);
            if (!allowedTypes.length) return true;
            return allowedTypes.some(type => {
                if (type === 'number') return typeof value === 'number' && Number.isFinite(value);
                if (type === 'string') return typeof value === 'string';
                return true;
            });
        },

        validateProductContract() {
            const contract = window.ATS_PRODUCT_DATA_CONTRACT;
            if (!contract) return;

            const products = this.getProductsForContractValidation();
            if (!products.length) return;

            const issues = [];
            products.forEach((product, index) => {
                Object.entries(contract).forEach(([field, expectedType]) => {
                    const value = product[field];
                    if (value === undefined || value === null || value === '') {
                        issues.push(`item#${index + 1}: missing \`${field}\``);
                        return;
                    }
                    if (!this.matchesContractType(value, expectedType)) {
                        issues.push(`item#${index + 1}: \`${field}\` expected ${expectedType}, got ${typeof value}`);
                    }
                });
            });

            if (issues.length) {
                console.warn('[ATS Catalog Contract] Validation warnings:', issues);
            }
        },

        writeStateToURL() {
            const minSlider = $('#price-min') || $('#mobile-price-min');
            const maxSlider = $('#price-max') || $('#mobile-price-max');
            const sortSelect = $('#catalog-sort-select');

            CatalogService.writeStateToURL(
                this.activeBrands,
                this.activeCategories,
                minSlider,
                maxSlider,
                sortSelect
            );
        },

        restoreStateFromURL() {
            const { brands, categories, min, max, sort } = CatalogService.readStateFromURL();

            this.activeBrands.clear();
            this.activeCategories.clear();
            brands.forEach(v => this.activeBrands.add(v));
            categories.forEach(v => this.activeCategories.add(v));

            $$('.filter-input').forEach(input => {
                const label = input.closest('label');
                const cb = label?.querySelector('.custom-checkbox');
                const text = label?.querySelector('span');
                const type = label?.dataset.filterType;
                const checked = type === 'category'
                    ? this.activeCategories.has(input.value)
                    : this.activeBrands.has(input.value);

                input.checked = checked;
                if (cb) cb.classList.toggle('active', checked);
                if (text) {
                    text.classList.toggle('text-primary', checked);
                    text.classList.toggle('font-bold', checked);
                }
            });

            const minSlider = $('#price-min');
            const maxSlider = $('#price-max');
            const minMobile = $('#mobile-price-min');
            const maxMobile = $('#mobile-price-max');
            if (min && minSlider) minSlider.value = min;
            if (max && maxSlider) maxSlider.value = max;
            if (min && minMobile) minMobile.value = min;
            if (max && maxMobile) maxMobile.value = max;

            if (sort) {
                const sortSelect = $('#catalog-sort-select');
                if (sortSelect) sortSelect.value = sort;
            }
        },

        initMobileDrawer() {
            const openBtn = $('#openMobileFilters');
            const drawer = $('#filterDrawer');
            const overlay = $('#filterOverlay');
            const closeBtn = $('#closeFilterDrawer');
            const applyBtn = drawer?.querySelector('.bg-primary.text-white');

            if (!openBtn || !drawer || !overlay) return;

            const openFilters = () => {
                drawer.style.transform = 'translateX(0)';
                overlay.classList.remove('hidden');
                overlay.classList.add('block');
                document.body.style.overflow = 'hidden';
            };

            const closeFilters = () => {
                drawer.style.transform = 'translateX(100%)';
                overlay.classList.add('hidden');
                overlay.classList.remove('block');
                document.body.style.overflow = '';
            };

            on(openBtn, 'click', openFilters);
            on(overlay, 'click', closeFilters);
            if (closeBtn) on(closeBtn, 'click', closeFilters);
            if (applyBtn) {
                on(applyBtn, 'click', () => {
                    this.filterProducts();
                    closeFilters();
                    Toast.show(isArabic ? 'تم تطبيق الفلاتر بنجاح' : 'Filters applied successfully', 'success');
                });
            }

            // Initial state
            drawer.style.transform = 'translateX(100%)';
        },

        filterProducts() {
            const cards = $$('.product-card[data-brand]');
            if (!cards.length) return;

            // Get values from either desktop or mobile (they are synced)
            const minSlider = $('#price-min') || $('#mobile-price-min');
            const maxSlider = $('#price-max') || $('#mobile-price-max');
            const minPrice = minSlider ? parseInt(minSlider.value) : 0;
            const maxPrice = maxSlider ? parseInt(maxSlider.value) : Infinity;

            let visibleCount = 0;
            cards.forEach(card => {
                const brand = card.dataset.brand || '';
                const price = parseInt(card.dataset.price) || 0;
                const category = card.dataset.category || '';

                let show = true;

                // Brand filter
                if (this.activeBrands.size > 0 && !this.activeBrands.has(brand)) {
                    show = false;
                }

                // Price filter
                if (price < minPrice || price > maxPrice) {
                    show = false;
                }

                // Category filter
                if (this.activeCategories.size > 0 && !this.activeCategories.has(category)) {
                    show = false;
                }

                card.style.display = show ? '' : 'none';
                if (show) visibleCount++;
            });

            // Update toolbar count (desktop) and mobile count
            const toolbar = $('#catalog-toolbar-count');
            if (toolbar) {
                toolbar.innerHTML = isArabic
                    ? `عرض <strong class="text-dark">${visibleCount}</strong> من أصل <strong class="text-dark">${cards.length}</strong> منتج`
                    : `Showing <strong class="text-dark">${visibleCount}</strong> of <strong class="text-dark">${cards.length}</strong> products`;
            }
            const mobileCount = $('#mobile-results-count');
            if (mobileCount) mobileCount.textContent = visibleCount;

            this.writeStateToURL();
        },

        filterCheckboxes() {
            const inputs = $$('aside .filter-input, #filterDrawer .filter-input');
            
            inputs.forEach(input => {
                on(input, 'change', () => {
                    const label = input.closest('label');
                    const itemName = input.value;
                    const willBeChecked = input.checked;

                    // Determine if this is a brand or category
                    let type = label.dataset.filterType;
                    if (!type) {
                        const sectionTitle = label.closest('div')?.querySelector('h3, h4')?.textContent?.trim();
                        type = ['Categories', 'الفئات'].includes(sectionTitle) ? 'category' : 'brand';
                    }

                    // Synchronize ALL instances of this filter (desktop and mobile)
                    $$(`.filter-input`).forEach(ipt => {
                        if (ipt.value === itemName) {
                            ipt.checked = willBeChecked;
                            const lbl = ipt.closest('label');
                            const cb = lbl?.querySelector('.custom-checkbox');
                            const text = lbl?.querySelector('span');
                            if (cb) {
                                if (willBeChecked) {
                                    cb.classList.add('active');
                                    if (text) text.classList.add('text-primary', 'font-bold');
                                } else {
                                    cb.classList.remove('active');
                                    if (text) text.classList.remove('text-primary', 'font-bold');
                                }
                            }
                        }
                    });

                    // Update State
                    if (itemName) {
                        const targetSet = (type === 'category') ? this.activeCategories : this.activeBrands;
                        if (willBeChecked) targetSet.add(itemName);
                        else targetSet.delete(itemName);
                    }

                    this.updateFilterTags();
                    this.filterProducts();
                    Toast.show(willBeChecked ? `${itemName}` : `Removed: ${itemName}`, 'info');
                });
            });
        },

        clearAllBtn() {
            const btn = $('#clear-filters-btn');
            if (!btn) return;

            on(btn, 'click', () => {
                this.activeBrands.clear();
                this.activeCategories.clear();
                
                // Uncheck all custom brand/category checkboxes and reset text
                $$('.custom-checkbox').forEach(cb => {
                    cb.classList.remove('active');
                    const label = cb.closest('label');
                    if (label) {
                        const text = label.querySelector('span');
                        if (text) text.classList.remove('text-primary', 'font-bold');
                    }
                });

                this.updateFilterTags();
                this.filterProducts();
                Toast.show(isArabic ? 'تم مسح جميع الفلاتر' : 'All filters cleared', 'info');
            });
        },

        filterTags() {
            // Make existing × buttons on filter tags work
            $$('.rounded-full button').forEach(btn => {
                const tag = btn.closest('.rounded-full');
                if (!tag || !btn.querySelector('svg')) return;

                on(btn, 'click', (e) => {
                    e.preventDefault();
                    const brandName = tag.textContent.trim().replace('×', '').trim();
                    this.activeBrands.delete(brandName);

                    // Uncheck the corresponding custom brand checkbox
                    $$('aside label span').forEach(span => {
                        if (span.textContent.trim() === brandName) {
                            const cb = $('.custom-checkbox', span.closest('label'));
                            if (cb) {
                                cb.classList.remove('active');
                            }
                        }
                    });

                    tag.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                    tag.style.opacity = '0';
                    tag.style.transform = 'scale(0.8)';
                    setTimeout(() => { tag.remove(); this.filterProducts(); }, 200);
                });
            });
        },

        updateFilterTags() {
            const container = $('#filter-tags-container');
            if (!container) return;

            container.innerHTML = '';
            this.activeCategories.forEach(cat => this.createTag(cat, 'category', container));
            this.activeBrands.forEach(brand => this.createTag(brand, 'brand', container));
        },

        createTag(name, type, container) {
            const tag = document.createElement('span');
            tag.className = 'bg-gray-light border border-gray-border text-dark px-3 py-1 rounded-full flex items-center gap-2 text-[12px]';
            tag.style.animation = 'fadeSlideIn 0.3s ease both';
            tag.innerHTML = `${name}<button class="text-gray-body hover:text-primary tag-remove"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>`;

            on($('.tag-remove', tag), 'click', () => {
                if (type === 'brand') this.activeBrands.delete(name);
                else this.activeCategories.delete(name);

                // Uncheck
                $$('label.cursor-pointer').forEach(l => {
                    const text = l.querySelector('span');
                    if (text?.textContent?.trim() === name) {
                        const cb = l.querySelector('.custom-checkbox');
                        if (cb) cb.classList.remove('active');
                        if (text) text.classList.remove('text-primary', 'font-bold');
                    }
                });

                tag.style.opacity = '0';
                tag.style.transform = 'scale(0.8)';
                setTimeout(() => { tag.remove(); this.filterProducts(); }, 200);
            });

            container.appendChild(tag);
        },

        sortDropdown() {
            const select = $('#catalog-sort-select');
            if (!select) return;
            on(select, 'change', () => {
                const grid = $('.grid.grid-cols-2, .grid.gap-6');
                if (!grid) return;
                const cards = [...grid.querySelectorAll('.product-card, [data-brand]')];
                if (!cards.length) return;
                cards.sort((a, b) => {
                    const pA = parseInt(a.dataset.price) || 0;
                    const pB = parseInt(b.dataset.price) || 0;
                    const v = select.value;
                    if (v.includes('Low') || v.includes('الأقل')) return pA - pB;
                    if (v.includes('High') || v.includes('الأعلى')) return pB - pA;
                    return 0;
                });
                cards.forEach(card => grid.appendChild(card));
                this.writeStateToURL();
                Toast.show(`Sorted by: ${select.value}`, 'info');
            });
        },

        pagination() {
            const ITEMS_PER_PAGE = 9;
            const paginationBtns = $$('.flex.items-center.justify-center.gap-2 button');
            
            const showPage = (pageNum) => {
                const grid = $('.grid.grid-cols-2, .grid.gap-6');
                if (!grid) return;
                const cards = [...grid.querySelectorAll('.product-card, [data-brand]')];
                if (!cards.length) return;
                
                const start = (pageNum - 1) * ITEMS_PER_PAGE;
                const end = start + ITEMS_PER_PAGE;
                cards.forEach((card, i) => {
                    card.style.display = (i >= start && i < end) ? '' : 'none';
                });
                
                grid.scrollIntoView({ behavior: 'smooth', block: 'start' });
            };
            
            paginationBtns.forEach(btn => {
                on(btn, 'click', () => {
                    const text = btn.textContent.trim();
                    const isNumberBtn = !['Previous', 'Next', 'السابق', 'التالي', '...'].includes(text);
                    
                    if (isNumberBtn) {
                        // Reset all number buttons to inactive state
                        paginationBtns.forEach(b => {
                            const t = b.textContent.trim();
                            if (!['Previous', 'Next', 'السابق', 'التالي', '...'].includes(t)) {
                                b.classList.remove('bg-primary', 'text-white', 'box-shadow');
                                b.classList.add('text-dark', 'hover:bg-gray-light');
                            }
                        });
                        
                        // Set clicked button to active state
                        btn.classList.remove('text-dark', 'hover:bg-gray-light');
                        btn.classList.add('bg-primary', 'text-white', 'box-shadow');
                        
                        // Safely parse number for Western or Eastern numerals, fallback to 1 if NaN
                        let pageNum = parseInt(text.replace(/[٠-٩]/g, d => '٠١٢٣٤٥٦٧٨٩'.indexOf(d)));
                        if (isNaN(pageNum)) pageNum = 1;
                        showPage(pageNum);
                    }
                });
            });
        },

        priceRange() {
            const setupSlider = (prefix) => {
                const minSlider = $(`#${prefix}price-min`);
                const maxSlider = $(`#${prefix}price-max`);
                const minDisplay = $(`#${prefix}price-min-display`);
                const maxDisplay = $(`#${prefix}price-max-display`);
                const activeTrack = $(`#${prefix}price-active-track`);
                
                if (!minSlider || !maxSlider) return;

                const formatNum = (n) => parseInt(n).toLocaleString();
                const gap = 5000;
                const maxLimit = parseInt(maxSlider.max) || 200000;

                const updateUI = () => {
                    const minVal = parseInt(minSlider.value);
                    const maxVal = parseInt(maxSlider.value);
                    const minP = (minVal / maxLimit) * 100;
                    const maxP = (maxVal / maxLimit) * 100;

                    if (activeTrack) {
                        activeTrack.style.left = minP + '%';
                        activeTrack.style.width = (maxP - minP) + '%';
                    }
                    if (minDisplay) minDisplay.value = formatNum(minVal);
                    if (maxDisplay) maxDisplay.value = formatNum(maxVal);
                };

                updateUI();

                const syncSet = (val, isMin) => {
                    const otherPrefix = prefix === 'mobile-' ? '' : 'mobile-';
                    const target = $(`#${otherPrefix}price-${isMin ? 'min' : 'max'}`);
                    if (target) {
                        target.value = val;
                        // Trigger updateUI on the other set without recursion issue
                        const otherTrack = $(`#${otherPrefix}price-active-track`);
                        const otherMinD = $(`#${otherPrefix}price-min-display`);
                        const otherMaxD = $(`#${otherPrefix}price-max-display`);
                        const otherMinS = $(`#${otherPrefix}price-min`);
                        const otherMaxS = $(`#${otherPrefix}price-max`);
                        
                        const minV = parseInt(otherMinS.value);
                        const maxV = parseInt(otherMaxS.value);
                        const minPer = (minV / maxLimit) * 100;
                        const maxPer = (maxV / maxLimit) * 100;

                        if (otherTrack) {
                            otherTrack.style.left = minPer + '%';
                            otherTrack.style.width = (maxPer - minPer) + '%';
                        }
                        if (otherMinD) otherMinD.value = formatNum(minV);
                        if (otherMaxD) otherMaxD.value = formatNum(maxV);
                    }
                };

                on(minSlider, 'input', () => {
                    if (parseInt(maxSlider.value) - parseInt(minSlider.value) < gap) {
                        minSlider.value = parseInt(maxSlider.value) - gap;
                    }
                    updateUI();
                    syncSet(minSlider.value, true);
                });

                on(maxSlider, 'input', () => {
                    if (parseInt(maxSlider.value) - parseInt(minSlider.value) < gap) {
                        maxSlider.value = parseInt(minSlider.value) + gap;
                    }
                    updateUI();
                    syncSet(maxSlider.value, false);
                });

                on(minSlider, 'change', () => this.filterProducts());
                on(maxSlider, 'change', () => this.filterProducts());
            };

            setupSlider('');
            setupSlider('mobile-');
        },

        sortSync() {
            const mobileSortBtns = $$('#filterDrawer button.rounded-lg');
            const desktopSelect = $('#catalog-sort-select');
            
            if (!mobileSortBtns.length || !desktopSelect) return;

            mobileSortBtns.forEach((btn, idx) => {
                on(btn, 'click', () => {
                    // Update Mobile UI
                    mobileSortBtns.forEach(b => {
                        b.classList.remove('border-primary', 'bg-red-50', 'text-primary', 'font-bold');
                        b.classList.add('border-gray-border', 'text-dark', 'font-medium');
                    });
                    btn.classList.add('border-primary', 'bg-red-50', 'text-primary', 'font-bold');
                    btn.classList.remove('border-gray-border', 'text-dark', 'font-medium');

                    // Sync to Desktop Select
                    desktopSelect.selectedIndex = idx;
                    desktopSelect.dispatchEvent(new Event('change'));
                });
            });

            // If desktop changes, sync mobile (optional but good for parity)
            on(desktopSelect, 'change', () => {
                const idx = desktopSelect.selectedIndex;
                if (mobileSortBtns[idx]) {
                    mobileSortBtns.forEach(b => {
                        b.classList.remove('border-primary', 'bg-red-50', 'text-primary', 'font-bold');
                        b.classList.add('border-gray-border', 'text-dark', 'font-medium');
                    });
                    mobileSortBtns[idx].classList.add('border-primary', 'bg-red-50', 'text-primary', 'font-bold');
                }
            });
        }
    };

    // ─── 8. UI UTILITIES ──────────────────────────────────────
    const UI = {
        init() {
            this.scrollToTop();
            this.smoothAnchors();
            this.injectAnimationCSS();
        },

        scrollToTop() {
            const btn = document.createElement('button');
            btn.id = 'scroll-to-top';
            btn.title = isArabic ? 'العودة للأعلى' : 'Back to top';
            btn.innerHTML = '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m18 15-6-6-6 6"/></svg>';
            Object.assign(btn.style, {
                position: 'fixed',
                bottom: '100px',
                right: isArabic ? 'auto' : '32px',
                left: isArabic ? '32px' : 'auto',
                width: '44px',
                height: '44px',
                borderRadius: '12px',
                background: 'rgba(243, 244, 246, 0.1)',
                color: '#6B7280',
                border: '1px solid rgba(156, 163, 175, 0.2)',
                cursor: 'pointer',
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'center',
                boxShadow: 'none',
                opacity: '0',
                transform: 'translateY(16px)',
                transition: 'opacity 0.3s ease, transform 0.3s ease, background 0.2s ease',
                zIndex: '9998',
                pointerEvents: 'none',
            });

            on(btn, 'mouseenter', () => { btn.style.background = 'rgba(156, 163, 175, 0.2)'; });
            on(btn, 'mouseleave', () => { btn.style.background = 'rgba(243, 244, 246, 0.1)'; });
            on(btn, 'click', () => { window.scrollTo({ top: 0, behavior: 'smooth' }); });

            document.body.appendChild(btn);

            let ticking = false;
            on(window, 'scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        const show = window.scrollY > 400;
                        btn.style.opacity = show ? '1' : '0';
                        btn.style.transform = show ? 'translateY(0)' : 'translateY(16px)';
                        btn.style.pointerEvents = show ? 'auto' : 'none';
                        ticking = false;
                    });
                    ticking = true;
                }
            });
        },

        smoothAnchors() {
            $$('a[href^="#"]').forEach(anchor => {
                on(anchor, 'click', function (e) {
                    const href = this.getAttribute('href');
                    if (href === '#') return;
                    e.preventDefault();
                    const target = $(href);
                    if (target) target.scrollIntoView({ behavior: 'smooth' });
                });
            });
        },

        injectAnimationCSS() {
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeSlideIn {
                    from { opacity: 0; transform: translateY(8px); }
                    to   { opacity: 1; transform: translateY(0); }
                }
                @keyframes pulse {
                    0%, 100% { transform: scale(1); }
                    50% { transform: scale(1.15); }
                }

                /* Toast animation helper */
                #toast-container > div {
                    animation: fadeSlideIn 0.35s ease both;
                }

                /* Scroll-to-top hover */
                #scroll-to-top:active {
                    transform: scale(0.95) !important;
                }

                @keyframes spin {
                    to { transform: rotate(360deg); }
                }
                .animate-spin {
                    animation: spin 1s linear infinite;
                }
            `;
            document.head.appendChild(style);
        }
    };

    const CheckoutService = {
        getCartData() {
            return JSON.parse(localStorage.getItem('ats_cart_data')) || [];
        },

        createOrderRecord(cartData, totals, options) {
            const now = new Date();
            const rand = Math.floor(10000 + Math.random() * 90000);
            const orderId = `ATS-${now.getFullYear()}-${rand}`;
            const dateISO = now.toISOString().slice(0, 10);

            const normalizedItems = (cartData || []).map(item => ({
                sku: item.sku || '',
                name: item.name || 'Product',
                qty: Math.max(1, Number(item.qty) || 1),
                unitPrice: Math.max(0, Math.round(Number(item.price) || 0)),
                image: item.image || ''
            }));

            return {
                id: orderId,
                dateISO,
                status: 'processing',
                shipping: totals.shipping,
                tax: totals.tax,
                items: normalizedItems,
                checkoutMeta: {
                    paymentMode: options?.paymentMode || 'credit',
                    discountCode: options?.discountCode || ''
                }
            };
        },

        persistOrder(orderRecord) {
            if (window.ATSOrdersService?.addOrder) {
                return window.ATSOrdersService.addOrder(orderRecord);
            }
            return orderRecord;
        },

        calculateTotals(cartData, shippingFee, discountRate) {
            let subtotal = 0;
            cartData.forEach(item => { subtotal += item.price * item.qty; });

            const shipping = subtotal > 0 ? shippingFee : 0;
            const discountAmount = Math.round(subtotal * discountRate);
            const taxableBase = Math.max(0, subtotal - discountAmount);
            const tax = Math.round(taxableBase * 0.14);
            const total = taxableBase + shipping + tax;
            const itemCount = cartData.reduce((sum, item) => sum + item.qty, 0);

            return { subtotal, shipping, discountAmount, taxableBase, tax, total, itemCount };
        },

        formatSummaryPrice(val, localeIsArabic, isTotal) {
            if (val === 0 && !isTotal) return localeIsArabic ? 'مجاني' : 'Free';
            return localeIsArabic ? `${val.toLocaleString()} ج.م` : `EGP ${val.toLocaleString()}.00`;
        }
    };

    // ─── 9. CHECKOUT MODULE ───────────────────────────────────
    const Checkout = {
        shippingFee: 0,
        paymentMode: 'credit',
        currentStep: 1,
        discountRate: 0,
        discountCode: '',

        init() {
            const nextBtn = $('#continuePaymentBtn');
            const placeBtn = $('#placeOrderBtn');
            const autoBtn = $('#autoFillBtn');
            const applyDiscountBtn = $('#applyDiscountBtn');

            if (nextBtn) {
                on(nextBtn, 'click', (e) => {
                    e.preventDefault();
                    this.validateShipping();
                });
            }

            if (placeBtn) {
                on(placeBtn, 'click', (e) => {
                    e.preventDefault();
                    this.placeOrder();
                });
            }

            if (autoBtn) {
                on(autoBtn, 'click', (e) => {
                    e.preventDefault();
                    this.autoFill();
                });
            }
            
            if (applyDiscountBtn) {
                on(applyDiscountBtn, 'click', (e) => {
                    e.preventDefault();
                    this.applyDiscount();
                });
            }

            // Shipping Method Listeners
            const standardShip = $('#shipping-standard');
            const expressShip = $('#shipping-express');
            if (standardShip) on(standardShip, 'click', () => this.selectShippingMethod('standard'));
            if (expressShip) on(expressShip, 'click', () => this.selectShippingMethod('express'));

            // Payment Mode Listeners
            const cardMode = $('#card-credit');
            const bankMode = $('#card-bank');
            const codMode = $('#card-cod');
            if (cardMode) on(cardMode, 'click', () => this.selectPaymentMode('credit'));
            if (bankMode) on(bankMode, 'click', () => this.selectPaymentMode('bank'));
            if (codMode) on(codMode, 'click', () => this.selectPaymentMode('cod'));

            this.renderCheckoutSummary();
            
            // Sync on every cart update event (local tab)
            window.addEventListener('cartUpdated', () => this.renderCheckoutSummary());
            
            // Sync on storage change (cross-tab sync)
            window.addEventListener('storage', (e) => {
                if (e.key === 'ats_cart_data') {
                    this.renderCheckoutSummary();
                }
            });
        },

        selectShippingMethod(method) {
            this.shippingFee = (method === 'express') ? 250 : 0;
            
            // Toggle UI classes
            const standard = $('#shipping-standard');
            const express = $('#shipping-express');
            
            if (method === 'standard') {
                standard?.classList.add('active', 'shadow-[0px_2px_8px_rgba(226,29,46,0.06)]');
                standard?.classList.remove('bg-white', 'hover:border-gray-300');
                express?.classList.remove('active', 'shadow-[0px_2px_8px_rgba(226,29,46,0.06)]');
                express?.classList.add('bg-white', 'hover:border-gray-300');
            } else {
                express?.classList.add('active', 'shadow-[0px_2px_8px_rgba(226,29,46,0.06)]');
                express?.classList.remove('bg-white', 'hover:border-gray-300');
                standard?.classList.remove('active', 'shadow-[0px_2px_8px_rgba(226,29,46,0.06)]');
                standard?.classList.add('bg-white', 'hover:border-gray-300');
            }

            this.renderCheckoutSummary();
        },

        selectPaymentMode(mode) {
            this.paymentMode = mode;
            
            // Toggle Card UI
            $$('.payment-card').forEach(card => {
                card.classList.remove('border-primary', 'bg-primary-light/50');
                card.classList.add('border-text-light', 'bg-white');
                const span = card.querySelector('span');
                const iconContainer = card.querySelector('div');
                if (span) span.className = 'text-[14px] font-medium text-text-muted text-center leading-tight px-1';
                if (iconContainer) iconContainer.classList.replace('bg-primary/10', 'bg-gray-100');
                const svg = iconContainer?.querySelector('svg');
                if (svg) svg.setAttribute('stroke', '#565D6D');
            });

            const activeCard = $(`#card-${mode}`);
            if (activeCard) {
                activeCard.classList.add('border-primary', 'bg-primary-light/50');
                activeCard.classList.remove('border-text-light', 'bg-white');
                const span = activeCard.querySelector('span');
                const iconContainer = activeCard.querySelector('div');
                if (span) span.className = 'text-[14px] font-bold text-primary text-center leading-tight px-1';
                if (iconContainer) iconContainer.classList.replace('bg-gray-100', 'bg-primary/10');
                const svg = iconContainer?.querySelector('svg');
                if (svg) svg.setAttribute('stroke', '#E21D2E');
            }

            // Toggle Form Visibility
            $$('#payment-forms-container > div').forEach(form => form.classList.add('hidden'));
            $(`#form-${mode}`)?.classList.remove('hidden');
        },

        getCartData() {
            return CheckoutService.getCartData();
        },

        calculateTotals(cartData) {
            return CheckoutService.calculateTotals(cartData, this.shippingFee, this.discountRate);
        },

        renderCheckoutSummary() {
            const summaryContainer = $('#checkout-items');
            const subtotalEl = $('#checkout-subtotal');
            const shippingEl = $('#checkout-shipping-fee');
            const taxEl = $('#checkout-tax');
            const totalEl = $('#checkout-total');
            const itemCountEl = $('#checkout-item-count');
            const discountRow = $('#checkout-discount-row');
            const discountEl = $('#checkout-discount');
            
            if (!summaryContainer && !subtotalEl) return;

            const cartData = this.getCartData();
            
            if (summaryContainer) {
                if (cartData.length === 0) {
                    summaryContainer.innerHTML = `<div class="py-12 text-center text-gray-body border border-dashed border-gray-border rounded-xl">
                        <p class="text-[14px] font-medium">${isArabic ? 'سلة التسوق فارغة' : 'Your cart is empty'}</p>
                    </div>`;
                } else {
                    let html = '';
                    cartData.forEach(item => {
                        const itemTotal = item.price * item.qty;
                        html += `
                        <div class="flex gap-4 group animate-fadeIn">
                            <div class="w-[64px] h-[64px] bg-background border border-text-light rounded-lg flex items-center justify-center overflow-hidden shrink-0 shadow-sm group-hover:border-primary/30 transition-colors">
                                <img src="${Cart.getCorrectImagePath(item.image)}" class="w-full h-full object-contain p-1" alt="${item.name}">
                            </div>
                            <div class="flex-1 flex flex-col min-w-0">
                                <span class="font-heading font-medium text-[14px] text-text-main leading-tight mb-1 truncate">${item.name}</span>
                                <span class="text-[12px] text-text-muted mb-auto">SKU: ${item.sku || ('ATS-' + (1000 + (item.id || 0)))}</span>
                                <div class="flex justify-between items-center mt-1">
                                    <span class="text-[13px] text-text-muted">${isArabic ? 'الكمية' : 'Qty'}: <strong class="text-dark font-bold">${item.qty}</strong></span>
                                    <span class="text-[14px] font-bold text-text-main">${isArabic ? '' : 'EGP '}${ itemTotal.toLocaleString() }${isArabic ? ' ج.م' : '.00'}</span>
                                </div>
                            </div>
                        </div>`;
                    });
                    summaryContainer.innerHTML = html;
                }
            }

            const totals = this.calculateTotals(cartData);

            // Update Summary Labels
            const formatPrice = (val, isTotal = false) => CheckoutService.formatSummaryPrice(val, isArabic, isTotal);

            if (subtotalEl) subtotalEl.textContent = formatPrice(totals.subtotal, true);
            if (shippingEl) shippingEl.textContent = formatPrice(totals.shipping);
            if (taxEl) taxEl.textContent = formatPrice(totals.tax, true);
            if (totalEl) totalEl.textContent = formatPrice(totals.total, true);
            if (discountRow && discountEl) {
                if (totals.discountAmount > 0) {
                    discountRow.classList.remove('hidden');
                    discountEl.textContent = isArabic
                        ? `- ${totals.discountAmount.toLocaleString()} ج.م`
                        : `- EGP ${totals.discountAmount.toLocaleString()}.00`;
                } else {
                    discountRow.classList.add('hidden');
                    discountEl.textContent = isArabic ? '- ٠ ج.م' : '- EGP 0.00';
                }
            }
            if (itemCountEl) {
                itemCountEl.textContent = isArabic 
                    ? `المجموع الفرعي (${totals.itemCount} منتجات)` 
                    : `Subtotal (${totals.itemCount} items)`;
            }
        },

        validateShipping() {
            const step1 = $('#shipping-step-container');
            if (!step1) return;

            const requiredFields = $$('.form-input[required], select[required]', step1);
            let valid = true;

            requiredFields.forEach(field => {
                const val = field.value ? field.value.trim() : '';
                if (!val) {
                    field.style.borderColor = '#EF4444';
                    field.style.boxShadow = '0 0 0 3px rgba(239,68,68,0.1)';
                    valid = false;
                } else {
                    field.style.borderColor = '';
                    field.style.boxShadow = '';
                }
            });

            if (valid) {
                this.goToStep(2);
                trackCommerceEvent('begin_checkout', { step: 2 });
                Toast.show(isArabic ? 'تم حفظ بيانات الشحن' : 'Shipping info saved!', 'success');
            } else {
                Toast.show(isArabic ? 'يرجى ملء جميع الحقول المطلوبة' : 'Please fill in all required fields', 'error');
            }
        },

        goToStep(step) {
            this.currentStep = step;
            
            // If going to step 2, scroll to payment and enable it
            if (step === 2) {
                const step2 = $('#payment-step-container');
                if (step2) {
                    step2.scrollIntoView({ behavior: 'smooth', block: 'center' });
                    step2.classList.remove('opacity-80', 'pointer-events-none');
                    step2.style.opacity = '1';
                    step2.style.pointerEvents = 'auto';
                    step2.classList.add('ring-2', 'ring-primary/20');
                    setTimeout(() => step2.classList.remove('ring-2', 'ring-primary/20'), 2000);
                    
                    $$('input[disabled]', step2).forEach(inp => { 
                        inp.disabled = false; 
                        inp.classList.remove('text-text-muted'); 
                        inp.classList.add('text-text-main'); 
                    });
                }
            }

            this.updateBreadcrumbs(step);
        },

        updateBreadcrumbs(step) {
            $$('.flex.items-center.gap-1.5 .w-5.h-5').forEach((circle, i) => {
                const stepNum = i + 1;
                if (stepNum < step) {
                    circle.classList.add('bg-green-500', 'text-white', 'border-green-500');
                    circle.classList.remove('bg-primary', 'border-text-muted', 'text-text-muted', 'border');
                    circle.innerHTML = '<svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 7.5 9 18.5 4 13.5"/></svg>';
                } else if (stepNum === step) {
                    circle.classList.add('bg-primary', 'text-white');
                    circle.classList.remove('border-text-muted', 'text-text-muted', 'border');
                }
            });
        },

        placeOrder() {
            const cartData = this.getCartData();
            if (!cartData.length) {
                Toast.show(isArabic ? 'السلة فارغة، أضف منتجًا أولاً' : 'Your cart is empty. Add an item first.', 'error');
                return;
            }
            if (this.currentStep < 2) {
                Toast.show(isArabic ? 'أكمل بيانات الشحن أولاً' : 'Complete shipping details first.', 'error');
                return;
            }
            if (!this.validatePayment()) {
                return;
            }

            const totals = this.calculateTotals(cartData);
            const orderRecord = CheckoutService.createOrderRecord(cartData, totals, {
                paymentMode: this.paymentMode,
                discountCode: this.discountCode
            });
            const savedOrder = CheckoutService.persistOrder(orderRecord);
            trackCommerceEvent('purchase', {
                currency: isArabic ? 'EGP' : 'EGP',
                value: totals.total,
                items_count: totals.itemCount,
            });

            localStorage.removeItem('ats_cart_data');
            const orderNum = savedOrder?.id || orderRecord.id;
            const main = $('main');
            if (main) {
                main.innerHTML = `
                <div class="max-w-[600px] mx-auto text-center py-20 px-6">
                    <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-green-100 flex items-center justify-center animate-bounce">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                            <polyline points="22 4 12 14.01 9 11.01"></polyline>
                        </svg>
                    </div>
                    <h1 class="font-heading font-bold text-[32px] text-text-main mb-3 tracking-tight">${isArabic ? 'تم تأكيد الطلب!' : 'Order Confirmed!'}</h1>
                    <p class="text-[16px] text-text-muted mb-2">${isArabic ? 'شكراً لشرائك منا.' : 'Thank you for your purchase.'}</p>
                    <p class="text-[14px] text-text-muted mb-8">${isArabic ? 'رقم طلبك هو ' : 'Your order number is '} <strong class="text-primary font-bold">${orderNum}</strong></p>
                    <div class="bg-[#F0FDF4] border border-green-200 rounded-xl p-6 mb-8 text-left">
                        <div class="flex items-center gap-3 mb-3 ${isArabic ? 'flex-row-reverse' : ''}">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#16A34A" stroke-width="2"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.93 1.93 0 01-2.06 0L2 7"/></svg>
                            <span class="font-medium text-[14px] text-green-800">${isArabic ? 'تم إرسال بريد التأكيد' : 'Confirmation email sent'}</span>
                        </div>
                        <p class="text-[13px] text-green-700 ${isArabic ? 'text-right' : ''}">${isArabic ? 'لقد أرسلنا بريداً إلكترونياً يحتوي على تفاصيل الطلب ومعلومات التتبع.' : "We've sent a confirmation to your email address with order details and tracking information."}</p>
                    </div>
                    <div class="flex gap-4 justify-center">
                        <a href="orders.html?order=${encodeURIComponent(orderNum)}" class="bg-primary text-white hover:bg-red-700 px-8 py-3.5 rounded-md text-[14px] font-medium transition-colors shadow-sm">${isArabic ? 'عرض الطلبات' : 'View Orders'}</a>
                        <a href="catalog.html" class="bg-white border border-gray-border text-dark hover:bg-gray-50 px-8 py-3.5 rounded-md text-[14px] font-medium transition-colors">${isArabic ? 'مواصلة التسوق' : 'Continue Shopping'}</a>
                    </div>
                </div>`;
                main.style.animation = 'fadeSlideIn 0.5s ease both';
            }
            Toast.show(isArabic ? 'تم تأكيد طلبك!' : 'Order confirmed!', 'success');
            window.dispatchEvent(new Event('cartUpdated'));
        },

        applyDiscount() {
            const input = $('#checkout-discount-code') || $('input[placeholder*="Discount"], input[placeholder*="discount"], input[placeholder*="خصم"]');
            if (!input) return;
            const code = input.value.trim().toUpperCase();
            const validCodes = { 'ATS10': 0.10, 'WELCOME': 0.05, 'SAVE20': 0.20 };

            if (!this.getCartData().length) {
                Toast.show(isArabic ? 'لا يمكن تطبيق خصم على سلة فارغة' : 'Cannot apply discount to an empty cart', 'error');
                return;
            }

            if (!code) {
                this.discountRate = 0;
                this.discountCode = '';
                input.style.borderColor = '';
                input.disabled = false;
                this.renderCheckoutSummary();
                return;
            }

            if (validCodes[code]) {
                const discount = validCodes[code];
                this.discountRate = discount;
                this.discountCode = code;
                Toast.show(isArabic ? `تم تطبيق الخصم: ${discount * 100}%!` : `Discount applied: ${discount * 100}% off!`, 'success');
                input.style.borderColor = '#16A34A';
                input.disabled = true;
                this.renderCheckoutSummary();
            } else if (code) {
                Toast.show(isArabic ? 'كود الخصم غير صالح' : 'Invalid discount code', 'error');
                input.style.borderColor = '#EF4444';
                setTimeout(() => { input.style.borderColor = ''; }, 2000);
            }
        },

        validatePayment() {
            const markInvalid = (field) => {
                field.style.borderColor = '#EF4444';
                field.style.boxShadow = '0 0 0 3px rgba(239,68,68,0.1)';
            };
            const markValid = (field) => {
                field.style.borderColor = '';
                field.style.boxShadow = '';
            };

            if (this.paymentMode === 'credit') {
                const name = $('#checkout-card-name');
                const number = $('#checkout-card-number');
                const expiry = $('#checkout-card-expiry');
                const cvc = $('#checkout-card-cvc');
                const fields = [name, number, expiry, cvc].filter(Boolean);
                let valid = true;

                fields.forEach(field => {
                    if (!field.value.trim()) {
                        markInvalid(field);
                        valid = false;
                    } else {
                        markValid(field);
                    }
                });

                const cardDigits = (number?.value || '').replace(/\D/g, '');
                if (number && cardDigits.length < 13) {
                    markInvalid(number);
                    valid = false;
                }

                const expiryValue = (expiry?.value || '').trim();
                if (expiry && !/^(0[1-9]|1[0-2])\/(\d{2})$/.test(expiryValue)) {
                    markInvalid(expiry);
                    valid = false;
                }

                const cvcDigits = (cvc?.value || '').replace(/\D/g, '');
                if (cvc && (cvcDigits.length < 3 || cvcDigits.length > 4)) {
                    markInvalid(cvc);
                    valid = false;
                }

                if (!valid) {
                    Toast.show(isArabic ? 'تحقق من بيانات البطاقة' : 'Please check card details', 'error');
                    return false;
                }
                return true;
            }

            if (this.paymentMode === 'bank') {
                const sender = $('#checkout-bank-sender');
                const reference = $('#checkout-bank-reference');
                let valid = true;

                [sender, reference].filter(Boolean).forEach(field => {
                    if (!field.value.trim()) {
                        markInvalid(field);
                        valid = false;
                    } else {
                        markValid(field);
                    }
                });

                if (!valid) {
                    Toast.show(isArabic ? 'أدخل بيانات التحويل البنكي' : 'Please complete bank transfer details', 'error');
                    return false;
                }
                return true;
            }

            if (this.paymentMode === 'cod') {
                const codConfirm = $('#checkout-cod-confirm');
                if (codConfirm && !codConfirm.checked) {
                    Toast.show(isArabic ? 'يرجى تأكيد الدفع عند الاستلام' : 'Please confirm cash on delivery', 'error');
                    return false;
                }
                return true;
            }

            return false;
        },

        autoFill() {
            const fields = $$('.form-input');
            const demoDataEn = ['Ahmed', 'Hassan', 'ahmed.hassan@company.com', '+20 100 123 4567', 'Building 14, Smart Village', 'Floor 3, Office 302', '6th of October', 'Giza', '12577'];
            const demoDataAr = ['أحمد', 'حسن', 'ahmed.hassan@company.com', '+20 100 123 4567', 'مبنى ١٤، القرية الذكية', 'الدور ٣، مكتب ٣٠٢', 'السادس من أكتوبر', 'الجيزة', '١٢٥٧٧'];
            const demoData = isArabic ? demoDataAr : demoDataEn;
            
            fields.forEach((field, i) => {
                if (field.closest('[class*="pointer-events-none"]')) return;
                if (demoData[i] && (field.tagName === 'INPUT' || field.tagName === 'SELECT')) {
                    field.value = demoData[i];
                    field.style.borderColor = '#16A34A';
                    setTimeout(() => { field.style.borderColor = ''; }, 1500);
                }
            });
            Toast.show(isArabic ? 'تم الملء التلقائي' : 'Auto-filled with demo data', 'info');
        }
    };

    // ─── 10. PRODUCT EXTRAS MODULE ────────────────────────────
    const ProductExtras = {
        init() {
            this.shareButton();
            this.wishlistButton();
        },

        shareButton() {
            const shareBtn = $('#shareBtn');
            if (shareBtn) {
                on(shareBtn, 'click', (e) => {
                    e.preventDefault();
                    if (navigator.share) {
                        navigator.share({ title: document.title, url: window.location.href }).catch(() => {});
                    } else if (navigator.clipboard && window.isSecureContext) {
                        navigator.clipboard.writeText(window.location.href).then(() => {
                            Toast.show(isArabic ? 'تم نسخ الرابط!' : 'Link copied to clipboard!', 'success');
                        }).catch(() => {
                            Toast.show(isArabic ? 'تم نسخ الرابط!' : 'Link copied!', 'success');
                        });
                    } else {
                        // Fallback for file:// protocol
                        Toast.show(isArabic ? 'رابط المنتج: ' + window.location.href.split('/').pop() : 'Product: ' + window.location.href.split('/').pop(), 'info');
                    }
                });
            }
        },

        wishlistButton() {
            const wishlistBtn = $('#wishlistBtn');
            if (wishlistBtn) {
                let wishlisted = false;
                on(wishlistBtn, 'click', (e) => {
                    e.preventDefault();
                    wishlisted = !wishlisted;
                    const path = wishlistBtn.querySelector('path');
                    if (!path) return;
                    
                    if (wishlisted) {
                        path.setAttribute('fill', '#E21D2E');
                        path.setAttribute('stroke', '#E21D2E');
                        wishlistBtn.classList.add('border-primary');
                        Toast.show(isArabic ? 'تمت الإضافة للمفضلة' : 'Added to wishlist', 'success');
                    } else {
                        path.setAttribute('fill', 'none');
                        path.setAttribute('stroke', 'currentColor');
                        wishlistBtn.classList.remove('border-primary');
                        Toast.show(isArabic ? 'تمت الإزالة من المفضلة' : 'Removed from wishlist', 'info');
                    }
                });
            }
        }
    };

    // ─── 11. MOBILE MENU MODULE ───────────────────────────────
    const MobileMenu = {
        init() {
            const menuBtn = $('#mobileMenuBtn');
            const drawer = $('#mobileDrawer');
            const overlay = $('#drawerOverlay');
            const closeBtn = $('#closeDrawerBtn');

            if (!menuBtn || !drawer || !overlay) return;

            const openMenu = () => {
                drawer.style.transform = isArabic ? 'translateX(0)' : 'translateX(0)';
                overlay.classList.remove('hidden');
                overlay.classList.add('block');
                document.body.style.overflow = 'hidden';
            };

            const closeMenu = () => {
                drawer.style.transform = isArabic ? 'translateX(-100%)' : 'translateX(100%)';
                overlay.classList.add('hidden');
                overlay.classList.remove('block');
                document.body.style.overflow = '';
            };

            on(menuBtn, 'click', openMenu);
            on(overlay, 'click', closeMenu);
            if (closeBtn) on(closeBtn, 'click', closeMenu);
            
            // Set initial off-screen state
            drawer.style.transform = isArabic ? 'translateX(-100%)' : 'translateX(100%)';
        }
    };

    // ─── APP INIT ─────────────────────────────────────────────
    document.addEventListener('DOMContentLoaded', () => {
        const hasAny = (selectors) => selectors.some(sel => !!$(sel));

        Navigation.init();
        Animations.init();

        // Keep startup simple but page-aware to avoid unnecessary work.
        if (hasAny(['.dropdown-cart-items', '#full-cart-items', '.add-to-cart-btn'])) Cart.init();
        if (hasAny(['#contactForm', '.shipping-option', '.shipping-method', '.payment-option'])) Forms.init();
        if (hasAny(['#mainProductImage', '.product-thumb', '.tab-btn', '#qtyMinus', '#qtyPlus'])) Product.init();
        if (hasAny(['#filterDrawer', 'aside .filter-input', '#catalog-sort-select', '.product-card[data-brand]'])) Catalog.init();
        if (hasAny(['#continuePaymentBtn', '#placeOrderBtn', '#checkout-items'])) Checkout.init();
        if (hasAny(['#shareBtn', '#wishlistBtn'])) ProductExtras.init();

        UI.init();
        MobileMenu.init();
        
        // Sync cart count globally
        const updateAllCartCounts = () => {
            const count = Cart.getTotals ? Cart.getTotals().qty : 0;
            $$('.dropdown-cart-count').forEach(el => {
                el.textContent = count;
                el.style.display = count >= 0 ? 'flex' : 'none';
            });
        };
        updateAllCartCounts();
        // Subscribe to cart changes if your cart module allows, or just poll on click
        window.addEventListener('cartUpdated', updateAllCartCounts);
    });

})();

