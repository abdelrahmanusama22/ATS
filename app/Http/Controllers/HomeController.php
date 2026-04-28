<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Service;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_active', true)->orderBy('order')->get();
        $services = Service::where('is_active', true)->get();
        $topProducts = Product::where('is_active', true)
                              ->orderBy('views_count', 'desc')
                              ->take(6)
                              ->get();
        $testimonials = \App\Models\Testimonial::where('is_active', true)->get();
                              
        return view('home', compact('sliders', 'services', 'topProducts', 'testimonials'));
    }
    
    public function showProduct($id)
    {
        $product = Product::where('is_active', true)->findOrFail($id);
        
        // Increment views count
        $product->increment('views_count');
        
        return view('shop.product', compact('product'));
    }
}
