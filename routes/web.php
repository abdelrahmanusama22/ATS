<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::view('/', 'home')->name('home');

// Pages
Route::prefix('pages')->group(function () {
    Route::view('/about', 'pages.about')->name('about');
    Route::view('/contact', 'pages.contact')->name('contact');
    Route::view('/404', 'pages.404')->name('404');
    Route::view('/coming-soon', 'pages.coming-soon')->name('coming-soon');
    Route::view('/privacy', 'pages.privacy')->name('privacy');
    Route::view('/services', 'pages.services')->name('services');
    Route::view('/solutions', 'pages.solutions')->name('solutions');
    Route::view('/terms', 'pages.terms')->name('terms');
});

// Shop
Route::prefix('shop')->group(function () {
    Route::view('/catalog', 'shop.catalog')->name('catalog');
    Route::view('/product', 'shop.product')->name('product');
    Route::view('/cart', 'shop.cart')->name('cart');
    Route::view('/checkout', 'shop.checkout')->name('checkout');
    Route::view('/search', 'shop.search')->name('search');
});

// User
Route::prefix('user')->group(function () {
    Route::view('/account', 'user.account')->name('account');
    Route::view('/login', 'user.login')->name('login');
    Route::view('/signup', 'user.signup')->name('signup');
    Route::view('/orders', 'user.orders')->name('orders');
    Route::view('/order-detail', 'user.order-detail')->name('order-detail');
    Route::view('/tracking', 'user.tracking')->name('tracking');
    Route::view('/wishlist', 'user.wishlist')->name('wishlist');
});
