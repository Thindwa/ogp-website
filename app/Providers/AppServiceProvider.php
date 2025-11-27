<?php

namespace App\Providers;

use App\Models\FooterSettings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        // Share footer settings with all views
        View::composer('layouts.partials.footer', function ($view) {
            $view->with('footerSettings', FooterSettings::getActive());
        });
    }
}
