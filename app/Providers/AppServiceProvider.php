<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('product.create',function($user){
                return false;
        });
        Gate::define('product.delete',function($user){
            return false;
        });
        //
        //paginator::
        // App::setLocale(request('locale','ar'));
        // echo App::currentLocale();
         Paginator::useBootstrap();
    }
}
