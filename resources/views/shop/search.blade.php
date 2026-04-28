@extends('layouts.app')

@section('title', 'Search - ATS')

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <h1 class="text-[30px] md:text-[40px] font-bold mb-2">{{ $contentBlocks['search_title']->content ?? 'Search Products' }}</h1>
            <p class="text-gray-body text-[15px]">{{ $contentBlocks['search_desc']->content ?? 'Find products by name, brand, or category.' }}</p>
        </header>

        <form action="{{ route('search') ?? '#' }}" method="GET">
            <section class="mb-8 bg-gray-light border border-gray-border rounded-xl p-4 md:p-5">
                <div class="flex flex-col md:flex-row gap-3">
                    <label for="search-input" class="sr-only">Search products</label>
                    <input name="q" id="search-input" type="search" placeholder="Search products..." class="h-[44px] w-full rounded-md border border-gray-border px-4 outline-none focus:border-primary" value="{{ request('q') }}" />
                    <button id="search-submit-btn" type="submit" class="h-[44px] px-5 rounded-md bg-primary text-white font-semibold hover:bg-[#C4182A] transition-colors">{{ $contentBlocks['search_btn']->content ?? 'Search' }}</button>
                    <a href="{{ route('search') ?? '#' }}" id="search-clear-btn" class="h-[44px] px-5 rounded-md border border-gray-border font-semibold hover:bg-white transition-colors flex items-center justify-center">{{ $contentBlocks['search_clear']->content ?? 'Clear' }}</a>
                </div>
            </section>

            <section class="mb-8 lg:hidden">
                <details class="border border-gray-border rounded-xl bg-white p-4">
                    <summary class="font-semibold cursor-pointer">{{ $contentBlocks['filter_title']->content ?? 'Filters' }}</summary>
                @php
                    $categories = $products->pluck('category.name')->filter()->unique();
                    $brands = $products->pluck('brand')->filter()->unique();
                @endphp
                <div class="mt-4 space-y-5">
                    <div>
                        <h3 class="font-semibold text-[14px] mb-2">{{ __('Category') }}</h3>
                        @foreach($categories as $category)
                        <label class="flex items-center gap-2 text-[14px] mb-2">
                            <input type="checkbox" data-filter="category" value="{{ $category }}"> {{ $category }}
                        </label>
                        @endforeach
                    </div>
                    <div>
                        <h3 class="font-semibold text-[14px] mb-2">{{ __('Brand') }}</h3>
                        @foreach($brands as $brand)
                        <label class="flex items-center gap-2 text-[14px] mb-2">
                            <input type="checkbox" data-filter="brand" value="{{ $brand }}"> {{ $brand }}
                        </label>
                        @endforeach
                    </div>
                </div>
            </details>
        </section>

        <section class="grid lg:grid-cols-[280px_1fr] gap-8">
            <aside class="hidden lg:block border border-gray-border rounded-xl p-5 h-fit">
                <h2 class="font-bold text-[18px] mb-4">{{ $contentBlocks['filter_title']->content ?? 'Filters' }}</h2>
                <div class="mb-6">
                    <h3 class="font-semibold text-[14px] mb-2">{{ $contentBlocks['filter_category']->content ?? 'Category' }}</h3>
                    @foreach($categories as $category)
                    <label class="flex items-center gap-2 text-[14px] mb-2">
                        <input type="checkbox" name="categories[]" value="{{ $category }}" {{ in_array($category, request('categories', [])) ? 'checked' : '' }}> {{ $category }}
                    </label>
                    @endforeach
                </div>
                <div>
                    <h3 class="font-semibold text-[14px] mb-2">{{ $contentBlocks['filter_brand']->content ?? 'Brand' }}</h3>
                    @foreach($brands as $brand)
                    <label class="flex items-center gap-2 text-[14px] mb-2">
                        <input type="checkbox" name="brands[]" value="{{ $brand }}" {{ in_array($brand, request('brands', [])) ? 'checked' : '' }}> {{ $brand }}
                    </label>
                    @endforeach
                </div>
                <button type="submit" class="mt-4 w-full h-[40px] bg-primary text-white rounded-md font-semibold hover:bg-red-700 transition-colors">Apply Filters</button>
            </aside>

            <div>
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 mb-5">
                    <p id="search-results-count" class="text-[14px] text-gray-body">{{ isset($searchResults) ? count($searchResults) : '0' }} {{ $contentBlocks['search_results_count']->content ?? 'results' }}</p>
                    <label for="search-sort-select" class="sr-only">Sort results</label>
                    <select name="sort" id="search-sort-select" class="h-[40px] border border-gray-border rounded-md px-3 text-[14px] bg-white" onchange="this.form.submit()">
                        <option value="relevance" {{ request('sort') == 'relevance' ? 'selected' : '' }}>{{ $contentBlocks['sort_relevance']->content ?? 'Sort: Relevance' }}</option>
                        <option value="price-asc" {{ request('sort') == 'price-asc' ? 'selected' : '' }}>{{ $contentBlocks['sort_price_asc']->content ?? 'Sort: Price Low to High' }}</option>
                        <option value="price-desc" {{ request('sort') == 'price-desc' ? 'selected' : '' }}>{{ $contentBlocks['sort_price_desc']->content ?? 'Sort: Price High to Low' }}</option>
                        <option value="name-asc" {{ request('sort') == 'name-asc' ? 'selected' : '' }}>{{ $contentBlocks['sort_name_asc']->content ?? 'Sort: Name A-Z' }}</option>
                    </select>
                </div>

                @if(!isset($searchResults) || count($searchResults) == 0)
                <div id="search-empty" class="border border-dashed border-gray-border rounded-xl p-10 text-center text-gray-body">
                    {{ $contentBlocks['search_empty']->content ?? 'No products match your search.' }}
                </div>
                @else
                <div id="search-results-grid" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
                    @foreach($searchResults as $item)
                    <article class="border border-gray-border rounded-xl overflow-hidden bg-white">
                        <a href="{{ route('product', $item->slug ?? $item->id) }}" class="block">
                            <div class="aspect-square bg-gray-light p-5">
                                <img class="w-full h-full object-contain" src="{{ $item->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $item->title }}">
                            </div>
                            <div class="p-4">
                                <p class="text-[12px] text-gray-body mb-1">{{ $item->category->name ?? 'Uncategorized' }} | {{ $item->brand ?? 'ATS' }}</p>
                                <h3 class="font-semibold text-[14px] text-dark mb-3 leading-snug">{{ $item->title }}</h3>
                                <p class="font-bold text-[16px]">{{ number_format($item->price) }} {{ $contentBlocks['product_currency']->content ?? 'EGP' }}</p>
                            </div>
                        </a>
                    </article>
                    @endforeach
                </div>
                @endif
            </div>
        </section>
        </form>
    </main>
@endsection

@push('scripts')
    <!-- Search filtering logic will be handled via server-side GET requests -->
@endpush
