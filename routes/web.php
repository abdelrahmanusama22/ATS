<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Service;
use App\Models\Page;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\CompanyController;

/*
|--------------------------------------------------------------------------
| Core & Localization
|--------------------------------------------------------------------------
*/
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

<<<<<<< Updated upstream
/*
|--------------------------------------------------------------------------
| Public Site & Company
|--------------------------------------------------------------------------
*/
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', [CompanyController::class, 'about'])->name('about');
Route::get('/careers', [CompanyController::class, 'careers'])->name('careers');
Route::get('/faq', [CompanyController::class, 'faq'])->name('faq');

Route::get('/contact', function () { return view('pages.contact'); })->name('contact');
Route::post('/contact', [CompanyController::class, 'submitContact'])->name('contact.submit');

/*
|--------------------------------------------------------------------------
| Shop & Services
|--------------------------------------------------------------------------
*/
Route::get('/catalog', function () { 
    $products = Product::where('is_active', true)->paginate(12);
    $categories = Category::has('products')->withCount('products')->get();
    return view('shop.catalog', compact('products', 'categories')); 
})->name('catalog');

Route::get('/solutions', function () { 
    $services = Service::where('is_active', true)->get();
    $products = Product::where('is_active', true)->take(3)->get();
    return view('pages.solutions', compact('services', 'products')); 
})->name('solutions');

Route::get('/services', function () { 
    $services = Service::where('is_active', true)->get();
    return view('pages.services', compact('services')); 
})->name('services');

Route::get('/search', function () { 
    $products = Product::with('category')->where('is_active', true)->get();
    return view('shop.search', compact('products')); 
})->name('search');

Route::get('/product/{id}', [HomeController::class, 'showProduct'])->name('product.show');
Route::get('/cart', function () { return view('shop.cart'); })->name('cart');
Route::get('/checkout', function () { return view('shop.checkout'); })->name('checkout');

/*
|--------------------------------------------------------------------------
| User Authentication
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', function () { return view('user.login'); })->name('login');
    
    Route::post('/login', function (Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('account');
        }
        
        return back()->withErrors(['email' => __('Invalid email or password.')])->withInput();
    });

    Route::get('/signup', function () { return view('user.signup'); })->name('signup');
    
    Route::post('/signup', function (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ]);
        
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);
        
        auth()->login($user);
        return redirect()->route('account');
    });
});

Route::post('/logout', function (Request $request) {
    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout')->middleware('auth');
=======
// Language Switcher
Route::get('/lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'ar'])) {
        session()->put('locale', $locale);
    }
    return redirect()->back();
})->name('lang.switch');

// Home
Route::get('/', function () {
    $sliders = \App\Models\Slider::where('is_active', true)->orderBy('order')->get();
    $services = \App\Models\Service::where('is_active', true)->take(4)->get();
    $topProducts = \App\Models\Product::where('is_active', true)->orderBy('views_count', 'desc')->take(4)->get();
    
    return view('home', compact('sliders', 'services', 'topProducts'));
})->name('home');

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
    Route::post('/contact-submit', [\App\Http\Controllers\ContactController::class, 'store'])->name('contact.submit');
});

// Shop
Route::prefix('shop')->group(function () {
    Route::get('/catalog', [\App\Http\Controllers\CatalogController::class, 'index'])->name('catalog');
    Route::get('/product/{id}', [\App\Http\Controllers\CatalogController::class, 'show'])->name('product');
    Route::view('/cart', 'shop.cart')->name('cart');
    Route::view('/checkout', 'shop.checkout')->name('checkout');
    Route::view('/search', 'shop.search')->name('search');
});
>>>>>>> Stashed changes

/*
|--------------------------------------------------------------------------
| User Dashboard & Tools
|--------------------------------------------------------------------------
*/
Route::get('/account', function () { return view('user.account'); })->name('account');
Route::get('/orders', function () { return view('user.orders'); })->name('orders');
Route::get('/order/{id}', function ($id) { return view('user.order-detail', compact('id')); })->name('order-detail');
Route::get('/tracking', function () { return view('user.tracking'); })->name('tracking');
Route::get('/wishlist', function () { return view('user.wishlist'); })->name('wishlist');

/*
|--------------------------------------------------------------------------
| Legal & Dynamic CMS Pages
|--------------------------------------------------------------------------
*/
Route::get('/privacy-policy', function () { 
    $page = Page::where('slug', 'privacy-policy')->where('is_active', true)->first();
    return view('pages.privacy', compact('page')); 
})->name('privacy');

Route::get('/terms-of-service', function () { 
    $page = Page::where('slug', 'terms-of-service')->where('is_active', true)->first();
    return view('pages.terms', compact('page')); 
})->name('terms');

Route::get('/page/{slug}', [PageController::class, 'show'])->name('page.show');
