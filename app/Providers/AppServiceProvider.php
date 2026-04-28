<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Setting;
use App\Models\Menu;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $globalSettings = \App\Models\Setting::where('is_active', true)
                                                 ->pluck('value', 'key')
                                                 ->toArray();

            $mainMenu = \App\Models\Menu::where('location', 'header')
                                        ->where('is_active', true)
                                        ->with(['items' => function($query) {
                                            $query->where('is_active', true)->orderBy('order');
                                        }])
                                        ->first();
                                        
            $contentBlocks = \App\Models\ContentBlock::where('is_active', true)
                                                     ->get()
                                                     ->keyBy('key');

            $view->with([
                'globalSettings' => $globalSettings,
                'mainMenu' => $mainMenu,
                'contentBlocks' => $contentBlocks,
            ]);
        });
    }
}
