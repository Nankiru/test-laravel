<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;


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
        // $this->loadTranslationsFrom(resource_path('lang/frontend'), 'frontend');
        // \Illuminate\Support\Facades\App::setLocale('km');

        Paginator::useBootstrap();
        if (config('app.env') !== 'local') {
            URL::forceScheme('https');
        }
    }
}
