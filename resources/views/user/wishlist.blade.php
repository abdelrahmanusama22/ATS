@extends('layouts.app')

@section('title', 'Wishlist - ATS')

@section('content')
    <main class="max-w-[1280px] mx-auto px-6 md:px-10 py-10 md:py-14">
        <header class="mb-8">
            <h1 class="text-[30px] md:text-[40px] font-bold mb-2">{{ $contentBlocks['wishlist_title']->content ?? 'My Wishlist' }}</h1>
            <p id="wishlist-count" class="text-gray-body text-[15px]">{{ isset($wishlistItems) ? count($wishlistItems) : '0' }} {{ $contentBlocks['wishlist_items_saved']->content ?? 'items saved' }}</p>
        </header>

        <section class="mb-6 flex flex-col sm:flex-row gap-3 sm:items-center sm:justify-between">
            <div class="w-full sm:w-auto">
                <label for="wishlist-sort" class="sr-only">Sort wishlist</label>
                <select id="wishlist-sort" class="h-[42px] w-full sm:w-[260px] border border-gray-border rounded-md px-3 text-[14px] bg-white">
                    <option value="newest">{{ $contentBlocks['sort_newest']->content ?? 'Sort: Newest' }}</option>
                    <option value="name-asc">{{ $contentBlocks['sort_name_asc']->content ?? 'Sort: Name A-Z' }}</option>
                    <option value="name-desc">{{ $contentBlocks['sort_name_desc']->content ?? 'Sort: Name Z-A' }}</option>
                    <option value="price-asc">{{ $contentBlocks['sort_price_asc']->content ?? 'Sort: Price Low to High' }}</option>
                    <option value="price-desc">{{ $contentBlocks['sort_price_desc']->content ?? 'Sort: Price High to Low' }}</option>
                </select>
            </div>
            <form action="#" method="POST">
                @csrf
                <button type="submit" class="h-[42px] px-5 rounded-md border border-gray-border font-semibold hover:bg-gray-50 transition-colors">
                    {{ $contentBlocks['wishlist_clear']->content ?? 'Clear Wishlist' }}
                </button>
            </form>
        </section>

        @if(!isset($wishlistItems) || count($wishlistItems) == 0)
        <div id="wishlist-empty" class="border border-dashed border-gray-border rounded-xl p-10 text-center text-gray-body mb-6">
            {{ $contentBlocks['wishlist_empty']->content ?? 'Your wishlist is empty. Start browsing and save products you want to revisit.' }}
        </div>
        @else
        <div id="wishlist-grid" class="grid sm:grid-cols-2 xl:grid-cols-3 gap-5">
            @foreach($wishlistItems as $item)
            <article class="border border-gray-border rounded-xl overflow-hidden bg-white">
                <a href="{{ route('product', $item->product->slug ?? $item->product->id) }}" class="block">
                    <div class="aspect-square bg-gray-light p-5">
                        <img class="w-full h-full object-contain" src="{{ $item->product->getFirstMediaUrl('default') ?: asset('assets/images/placeholder.jpg') }}" alt="{{ $item->product->title }}">
                    </div>
                </a>
                <div class="p-4">
                    <p class="text-[12px] text-gray-body mb-1">{{ $item->product->brand ?? 'ATS' }}</p>
                    <h3 class="font-semibold text-[14px] text-dark mb-3 leading-snug">{{ $item->product->title }}</h3>
                    <p class="font-bold text-[16px] mb-4">{{ number_format($item->product->price) }} {{ $contentBlocks['product_currency']->content ?? 'EGP' }}</p>
                    <div class="flex gap-2">
                        <a href="{{ route('product', $item->product->slug ?? $item->product->id) }}" class="flex-1 h-[38px] inline-flex items-center justify-center rounded-md border border-gray-border text-[13px] font-semibold hover:bg-gray-50 transition-colors">
                            {{ $contentBlocks['wishlist_view']->content ?? 'View' }}
                        </a>
                        <form action="#" method="POST" class="flex-1">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $item->product->id }}">
                            <button type="submit" class="w-full h-[38px] inline-flex items-center justify-center rounded-md bg-primary text-white text-[13px] font-semibold hover:bg-[#C4182A]">
                                {{ $contentBlocks['product_add_cart']->content ?? 'Add to Cart' }}
                            </button>
                        </form>
                        <form action="#" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="h-[38px] px-3 inline-flex items-center justify-center rounded-md border border-gray-border text-[12px] font-semibold hover:bg-gray-50 transition-colors">
                                {{ $contentBlocks['wishlist_remove']->content ?? 'Remove' }}
                            </button>
                        </form>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @endif
    </main>
@endsection
