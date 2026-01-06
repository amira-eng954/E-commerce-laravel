<?php

namespace App\Providers;
use App\Events\CartEvent;
use App\Listeners\CartListener;

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
