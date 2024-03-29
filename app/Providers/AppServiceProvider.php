<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * auth any application service.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application service.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
