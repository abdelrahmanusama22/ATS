@extends('layouts.app')

@section('title', 'Search - ATS')

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <h1 class="text-[30px] md:text-[40px] font-bold mb-2">Search Products</h1>
            <p class="text-gray-body text-[15px]">Find products by name, brand, or category.</p>
        </header>

        <section class="mb-8 bg-gray-light border border-gray-border rounded-xl p-4 md:p-5">
            <div class="flex flex-col md:flex-row gap-3">
                <label for="search-input" class="sr-only">Search products</label>
                <input id="search-input" type="search" placeholder="Search products..." class="h-[44px] w-full rounded-md border border-gray-border px-4 outline-none focus:border-primary" />
                <button id="search-submit-btn" type="button" class="h-[44px] px-5 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">Search</button>
                <button id="search-clear-btn" type="button" class="h-[44px] px-5 rounded-md border border-gray-border font-semibold hover:bg-white transition-colors">Clear</button>
            </div>
        </section>

        <section class="mb-8 lg:hidden">
            <details class="border border-gray-border rounded-xl bg-white p-4">
                <summary class="font-semibold cursor-pointer">Filters</summary>
                <div class="mt-4 space-y-5">
                    <div>
                        <h3 class="font-semibold text-[14px] mb-2">Category</h3>
                        <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="category" value="Servers"> Servers</label>
                        <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="category" value="Networking"> Networking</label>
                        <label class="flex items-center gap-2 text-[14px]"><input type="checkbox" data-filter="category" value="Storage"> Storage</label>
                    </div>
                    <div>
                        <h3 class="font-semibold text-[14px] mb-2">Brand</h3>
                        <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="brand" value="Dell"> Dell</label>
                        <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="brand" value="Cisco"> Cisco</label>
                        <label class="flex items-center gap-2 text-[14px]"><input type="checkbox" data-filter="brand" value="Synology"> Synology</label>
                    </div>
                </div>
            </details>
        </section>

        <section class="grid lg:grid-cols-[280px_1fr] gap-8">
            <aside class="hidden lg:block border border-gray-border rounded-xl p-5 h-fit">
                <h2 class="font-bold text-[18px] mb-4">Filters</h2>
                <div class="mb-6">
                    <h3 class="font-semibold text-[14px] mb-2">Category</h3>
                    <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="category" value="Servers"> Servers</label>
                    <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="category" value="Networking"> Networking</label>
                    <label class="flex items-center gap-2 text-[14px]"><input type="checkbox" data-filter="category" value="Storage"> Storage</label>
                </div>
                <div>
                    <h3 class="font-semibold text-[14px] mb-2">Brand</h3>
                    <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="brand" value="Dell"> Dell</label>
                    <label class="flex items-center gap-2 text-[14px] mb-2"><input type="checkbox" data-filter="brand" value="Cisco"> Cisco</label>
                    <label class="flex items-center gap-2 text-[14px]"><input type="checkbox" data-filter="brand" value="Synology"> Synology</label>
                </div>
            </aside>

            <div>
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
                    <p id="search-results-count" class="text-[14px] text-gray-body">0 results</p>
                    <label for="search-sort-select" class="sr-only">Sort results</label>
                    <select id="search-sort-select" class="h-[40px] border border-gray-border rounded-md px-3 text-[14px] bg-white">
                        <option value="relevance">Sort: Relevance</option>
                        <option value="price-asc">Sort: Price Low to High</option>
                        <option value="price-desc">Sort: Price High to Low</option>
                        <option value="name-asc">Sort: Name A-Z</option>
                    </select>
                </div>

                <div id="search-empty" class="hidden border border-dashed border-gray-border rounded-xl p-10 text-center text-gray-body">
                    No products match your search.
                </div>

                <div id="search-results-grid" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5"></div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script src="{{ asset('assets/js/dom-safe.js') }}"></script>
    <script>
    (function () {
        var DomSafe = window.ATSDomSafe;
        const data = [
            { sku: 'ATS-1001', name: 'Dell PowerEdge R750 Server', brand: 'Dell', category: 'Servers', price: 285000, image: '{{ asset('assets/images/downloaded/photo_1557597774_9d273605dfa9.jpg') }}' },
            { sku: 'ATS-1002', name: 'Cisco Catalyst 9300 Switch', brand: 'Cisco', category: 'Networking', price: 142000, image: '{{ asset('assets/images/downloaded/photo_1581092160562_40aa08e78837.jpg') }}' },
            { sku: 'ATS-1003', name: 'Synology RackStation RS1221+', brand: 'Synology', category: 'Storage', price: 76000, image: '{{ asset('assets/images/downloaded/photo_1573164713988_8665fc963095.jpg') }}' },
            { sku: 'ATS-1004', name: 'Dell EMC Unity Storage Array', brand: 'Dell', category: 'Storage', price: 315000, image: '{{ asset('assets/images/downloaded/photo_1593642632823_8f785ba67e45.jpg') }}' },
            { sku: 'ATS-1005', name: 'Cisco Meraki MX Security Appliance', brand: 'Cisco', category: 'Networking', price: 98000, image: '{{ asset('assets/images/downloaded/photo_1628102491629_778571d893a3.jpg') }}' }
        ];

        const state = {
            q: '',
            sort: 'relevance',
            brands: new Set(),
            categories: new Set()
        };

        const input = document.getElementById('search-input');
        const submitBtn = document.getElementById('search-submit-btn');
        const clearBtn = document.getElementById('search-clear-btn');
        const countEl = document.getElementById('search-results-count');
        const sortEl = document.getElementById('search-sort-select');
        const emptyEl = document.getElementById('search-empty');
        const gridEl = document.getElementById('search-results-grid');
        const filterEls = Array.from(document.querySelectorAll('input[data-filter]'));

        function debounce(fn, delay) {
            let timer = null;
            return function () {
                const args = arguments;
                clearTimeout(timer);
                timer = setTimeout(function () { fn.apply(null, args); }, delay);
            };
        }

        function score(item) {
            if (!state.q) return 1;
            const haystack = (item.name + ' ' + item.brand + ' ' + item.category).toLowerCase();
            const idx = haystack.indexOf(state.q);
            if (idx === -1) return 0;
            return Math.max(1, 100 - idx);
        }

        function applyFilters(items) {
            return items.filter(function (item) {
                const qOk = state.q ? score(item) > 0 : true;
                const brandOk = state.brands.size ? state.brands.has(item.brand) : true;
                const categoryOk = state.categories.size ? state.categories.has(item.category) : true;
                return qOk && brandOk && categoryOk;
            });
        }

        function applySort(items) {
            if (state.sort === 'price-asc') return items.slice().sort(function (a, b) { return a.price - b.price; });
            if (state.sort === 'price-desc') return items.slice().sort(function (a, b) { return b.price - a.price; });
            if (state.sort === 'name-asc') return items.slice().sort(function (a, b) { return a.name.localeCompare(b.name); });
            return items.slice().sort(function (a, b) { return score(b) - score(a); });
        }

        function renderCardNode(item) {
            var article = DomSafe.el('article', { className: 'border border-gray-border rounded-xl overflow-hidden bg-white' });
            var link = DomSafe.el('a', {
                className: 'block',
                attrs: { href: '{{ url('product') }}?sku=' + encodeURIComponent(item.sku) }
            });
            var media = DomSafe.el('div', { className: 'aspect-square bg-gray-light p-5' });
            var image = DomSafe.el('img', {
                className: 'w-full h-full object-contain',
                attrs: { src: item.image, alt: item.name }
            });
            media.appendChild(image);

            var body = DomSafe.el('div', { className: 'p-4' });
            body.appendChild(DomSafe.el('p', {
                className: 'text-[12px] text-gray-body mb-1',
                text: item.category + ' | ' + item.brand
            }));
            body.appendChild(DomSafe.el('h3', {
                className: 'font-semibold text-[14px] text-dark mb-3 leading-snug',
                text: item.name
            }));
            body.appendChild(DomSafe.el('p', {
                className: 'font-bold text-[16px]',
                text: item.price.toLocaleString('en-US') + ' EGP'
            }));

            link.appendChild(media);
            link.appendChild(body);
            article.appendChild(link);
            return article;
        }

        function render() {
            const filtered = applyFilters(data);
            const sorted = applySort(filtered);

            countEl.textContent = sorted.length + (sorted.length === 1 ? ' result' : ' results');
            DomSafe.clearAndAppend(gridEl, sorted.map(renderCardNode));
            emptyEl.classList.toggle('hidden', sorted.length > 0);
            gridEl.classList.toggle('hidden', sorted.length === 0);
        }

        const onInput = debounce(function () {
            state.q = input.value.trim().toLowerCase();
            render();
        }, 250);

        input.addEventListener('input', onInput);
        submitBtn.addEventListener('click', function () {
            state.q = input.value.trim().toLowerCase();
            render();
        });
        clearBtn.addEventListener('click', function () {
            state.q = '';
            state.sort = 'relevance';
            state.brands.clear();
            state.categories.clear();
            input.value = '';
            sortEl.value = 'relevance';
            filterEls.forEach(function (el) { el.checked = false; });
            render();
        });
        sortEl.addEventListener('change', function () {
            state.sort = sortEl.value;
            render();
        });
        filterEls.forEach(function (el) {
            el.addEventListener('change', function () {
                const bucket = el.getAttribute('data-filter') === 'brand' ? state.brands : state.categories;
                if (el.checked) bucket.add(el.value);
                else bucket.delete(el.value);
                render();
            });
        });

        render();
    })();
    </script>
@endpush
