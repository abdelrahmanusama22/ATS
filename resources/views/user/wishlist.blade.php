@extends('layouts.app')

@section('title', 'Wishlist - ATS')

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <h1 class="text-[30px] md:text-[40px] font-bold mb-2">My Wishlist</h1>
            <p id="wishlist-count" class="text-gray-body text-[15px]">0 items saved</p>
        </header>

        <section class="mb-6 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
            <div class="w-full sm:w-auto">
                <label for="wishlist-sort" class="sr-only">Sort wishlist</label>
                <select id="wishlist-sort" class="h-[42px] w-full sm:w-[260px] border border-gray-border rounded-md px-3 text-[14px] bg-white">
                    <option value="newest">Sort: Newest</option>
                    <option value="name-asc">Sort: Name A-Z</option>
                    <option value="name-desc">Sort: Name Z-A</option>
                    <option value="price-asc">Sort: Price Low to High</option>
                    <option value="price-desc">Sort: Price High to Low</option>
                </select>
            </div>
            <button id="wishlist-clear-btn" type="button" class="h-[42px] px-5 rounded-md border border-gray-border font-semibold hover:bg-gray-50 transition-colors">
                Clear Wishlist
            </button>
        </section>

        <div id="wishlist-empty" class="hidden border border-dashed border-gray-border rounded-xl p-10 text-center text-gray-body mb-6">
            Your wishlist is empty. Start browsing and save products you want to revisit.
        </div>

        <div id="wishlist-grid" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5"></div>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dom-safe.js') }}"></script>
    <script>
    (function () {
        var DomSafe = window.ATSDomSafe;
        var STORAGE_KEY = 'ats_wishlist_data';
        var gridEl = document.getElementById('wishlist-grid');
        var emptyEl = document.getElementById('wishlist-empty');
        var countEl = document.getElementById('wishlist-count');
        var sortEl = document.getElementById('wishlist-sort');
        var clearBtn = document.getElementById('wishlist-clear-btn');

        function safeParse(raw) {
            try {
                var data = JSON.parse(raw || '[]');
                return Array.isArray(data) ? data : [];
            } catch (e) {
                return [];
            }
        }

        function normalize(item, idx) {
            var sku = String(item.sku || item.id || ('WISHLIST-' + idx));
            var name = String(item.name || item.title || 'Product');
            var brand = String(item.brand || 'ATS');
            var priceNum = Number(item.price || 0);
            var image = String(item.image || '{{ asset('assets/images/logo.jpeg') }}');
            return {
                sku: sku,
                name: name,
                brand: brand,
                price: Number.isFinite(priceNum) ? priceNum : 0,
                image: image,
                createdAt: Number(item.createdAt || Date.now())
            };
        }

        function load() {
            return safeParse(localStorage.getItem(STORAGE_KEY)).map(normalize);
        }

        function save(items) {
            localStorage.setItem(STORAGE_KEY, JSON.stringify(items));
        }

        function sortItems(items) {
            var mode = sortEl.value;
            var next = items.slice();
            if (mode === 'name-asc') next.sort(function (a, b) { return a.name.localeCompare(b.name); });
            else if (mode === 'name-desc') next.sort(function (a, b) { return b.name.localeCompare(a.name); });
            else if (mode === 'price-asc') next.sort(function (a, b) { return a.price - b.price; });
            else if (mode === 'price-desc') next.sort(function (a, b) { return b.price - a.price; });
            else next.sort(function (a, b) { return b.createdAt - a.createdAt; });
            return next;
        }

        function removeItem(sku) {
            var items = load().filter(function (item) { return item.sku !== sku; });
            save(items);
            render();
        }

        function cardNode(item) {
            var article = DomSafe.el('article', { className: 'border border-gray-border rounded-xl overflow-hidden bg-white' });
            var viewLink = DomSafe.el('a', {
                className: 'block',
                attrs: { href: '{{ route('product') }}?sku=' + encodeURIComponent(item.sku) }
            });
            var media = DomSafe.el('div', { className: 'aspect-square bg-gray-light p-5' });
            var image = DomSafe.el('img', {
                className: 'w-full h-full object-contain',
                attrs: { src: item.image, alt: item.name }
            });
            media.appendChild(image);
            viewLink.appendChild(media);

            var body = DomSafe.el('div', { className: 'p-4' });
            body.appendChild(DomSafe.el('p', { className: 'text-[12px] text-gray-body mb-1', text: item.brand }));
            body.appendChild(DomSafe.el('h3', {
                className: 'font-semibold text-[14px] text-dark mb-3 leading-snug',
                text: item.name
            }));
            body.appendChild(DomSafe.el('p', {
                className: 'font-bold text-[16px] mb-4',
                text: item.price.toLocaleString('en-US') + ' EGP'
            }));

            var actions = DomSafe.el('div', { className: 'flex gap-2' });
            actions.appendChild(DomSafe.el('a', {
                className: 'flex-1 h-[38px] inline-flex items-center justify-center rounded-md border border-gray-border text-[13px] font-semibold hover:bg-gray-50 transition-colors',
                text: 'View',
                attrs: { href: '{{ route('product') }}?sku=' + encodeURIComponent(item.sku) }
            }));
            actions.appendChild(DomSafe.el('button', {
                className: 'flex-1 h-[38px] inline-flex items-center justify-center rounded-md bg-primary text-white text-[13px] font-semibold hover:bg-[#C4182A] add-to-cart-btn',
                text: 'Add to Cart',
                attrs: { type: 'button' },
                dataset: {
                    id: item.sku,
                    name: item.name,
                    price: item.price,
                    image: item.image
                }
            }));
            actions.appendChild(DomSafe.el('button', {
                className: 'h-[38px] px-3 inline-flex items-center justify-center rounded-md border border-gray-border text-[12px] font-semibold hover:bg-gray-50 transition-colors',
                text: 'Remove',
                attrs: { type: 'button' },
                dataset: { remove: item.sku }
            }));

            body.appendChild(actions);
            article.appendChild(viewLink);
            article.appendChild(body);
            return article;
        }

        function render() {
            var items = sortItems(load());
            countEl.textContent = items.length + (items.length === 1 ? ' item saved' : ' items saved');
            emptyEl.classList.toggle('hidden', items.length > 0);
            gridEl.classList.toggle('hidden', items.length === 0);
            DomSafe.clearAndAppend(gridEl, items.map(cardNode));

            Array.prototype.forEach.call(gridEl.querySelectorAll('[data-remove]'), function (btn) {
                btn.addEventListener('click', function () {
                    removeItem(btn.getAttribute('data-remove'));
                });
            });
        }

        sortEl.addEventListener('change', render);
        clearBtn.addEventListener('click', function () {
            save([]);
            render();
        });

        render();
    })();
    </script>
@endpush
