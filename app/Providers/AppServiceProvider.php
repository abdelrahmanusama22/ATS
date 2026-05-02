<?php

namespace App\Providers;

use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
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
<<<<<<< Updated upstream
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
=======
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['en', 'ar'])
                ->labels([
                    'en' => 'English',
                    'ar' => 'العربية',
                ])
                ->visible(insidePanels: true);
        });

        // Share Menus globally
        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $view->with('menus', \Illuminate\Support\Facades\Cache::remember('global_menus', 3600, function () {
                return \App\Models\Menu::with(['items' => function ($query) {
                    $query->where('is_active', true)->orderBy('order');
                }])->where('is_active', true)->get()->keyBy('location');
            }));
>>>>>>> Stashed changes
        });
    }
}
