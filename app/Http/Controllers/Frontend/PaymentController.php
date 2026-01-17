<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //

    public function payment()
    {
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET_KEY'));
       $paymentIntent = $stripe->paymentIntents->create([
       'amount' => 2000,
       'currency' => 'usd',
        'automatic_payment_methods' => ['enabled' => true],
]);
 return response()->json([
        'client_secret' => $paymentIntent->client_secret
    ]);
}
    
}
