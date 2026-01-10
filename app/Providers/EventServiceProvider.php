<?php

namespace App\Providers;
use App\Events\CartEvent;
use App\Events\ProductEvent;
use App\Listeners\CartListener;
use App\Listeners\ProductListener;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */

    protected $listen = [

     CartEvent::class=>[
           CartListener::class
     ],

     ProductEvent::class=>[
           ProductListener::class
     ],


        // listener

     ];
     // EventServiceProvider

    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //

    }
}
