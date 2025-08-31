<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
        // Register the language middleware
        $this->app['router']->pushMiddlewareToGroup('web', \App\Http\Middleware\LanguageMiddleware::class);
    }
}
