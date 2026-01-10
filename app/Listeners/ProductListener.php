<?php

namespace App\Listeners;

use App\Events\ProductEvent;
use App\Models\User;
use App\Notifications\ProductNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProductListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProductEvent $event): void
    {
        //
        $user=User::where('role','admin')->first();
        $user->notify(new ProductNotification($event->product));
    }
}
