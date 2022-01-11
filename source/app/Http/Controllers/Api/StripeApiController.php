<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// $stripe = new \Stripe\StripeClient('sk_test_51ImUz1JXE2S1O9gfhnusET2c8xVsScxfQdkcAs8MVhHsVDRFu6cZX45rbj8Q9zMOvEwdiXhmLc80JVpV6zPYSs0N00gLy89mTT');
require_once('../admin/source/app/Http/Controllers/Api/stripe-php/init.php');

class StripeApiController extends Controller
{
    public function stripeApi(Request $request)
    {
        $stripe = new \Stripe\StripeClient('sk_test_51ImUz1JXE2S1O9gfhnusET2c8xVsScxfQdkcAs8MVhHsVDRFu6cZX45rbj8Q9zMOvEwdiXhmLc80JVpV6zPYSs0N00gLy89mTT');
        // $stripe.charges.create([
        //         'unit_amount_decimal' => $request->amount,
        //         'currency' => $request->currency,
        //         'source' => 'tok_mastercard',
        //     ])
        //     .then(($charge) => {
        //         return $charge;
        //     })
        //     .catch($error => {
        //         return $error;
        //     })
        $charge = $stripe->charges->create([
            'amount' => $request->amount,
            'currency' => $request->currency,
            'source' => $request->token
        ]);
        return $charge;
        
        // $customer = $stripe->customers->create([
        //     'description' => 'example customer',
        //     'email' => 'email@example.com',
        //     'payment_method' => 'pm_card_visa',
        // ]);
        // echo $customer;
    }
}