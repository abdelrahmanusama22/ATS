<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Page::where('is_active', true)
                    ->where(function($query) use ($slug) {
                        $query->where('slug->en', $slug)
                              ->orWhere('slug->ar', $slug);
                    })
                    ->firstOrFail();
                    
        return view('pages.show', compact('page'));
    }
}
