<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with('category');

        if ($request->filled('categories')) {
            $categories = (array) $request->categories;
            $query->whereIn('category_id', $categories);
        }

        if ($request->filled('brands')) {
            $brands = (array) $request->brands;
            $query->whereIn('brand', $brands);
        }

        // Sorting
        if ($request->filled('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            } elseif ($request->sort == 'newest') {
                $query->latest();
            }
        } else {
            $query->latest();
        }

        $products = $query->paginate(12)->withQueryString();
        
        $categories = Category::where('is_active', true)->get();
        $brands = Product::where('is_active', true)->whereNotNull('brand')->distinct()->pluck('brand');

        return view('shop.catalog', compact('products', 'categories', 'brands'));
    }

    public function show($id)
    {
        $product = Product::with(['category', 'variants', 'reviews' => function($q) {
            $q->where('is_approved', true);
        }])->where('is_active', true)->findOrFail($id);

        $product->increment('views_count');

        $relatedProducts = Product::where('is_active', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->take(4)
            ->get();

        return view('shop.product', compact('product', 'relatedProducts'));
    }
}
