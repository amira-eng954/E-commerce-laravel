<?php

namespace App\Listeners;
use App\Events\CartEvent;
use App\Models\Product;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CartListener
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
    public function handle(CartEvent $event): void
    {
        //
        //dd($event->cart->qun);
        $user = User::where('id',$event->cart->user_id)->first();
       // $ff=$product->update(['qun'=>"{$product->qun} - {$event->cart->qun}" ]);
       // dd($product['qun']);
       $user->notify(new OrderNotification($event->cart));
        //echo"amira";
    }
}
