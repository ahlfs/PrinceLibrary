<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
        $this->app->make(RateLimiter::class)->for('sendemail', function (Request $req) {
            return Limit::perMinute(10)->by($req->ip());
        });
    }
}
