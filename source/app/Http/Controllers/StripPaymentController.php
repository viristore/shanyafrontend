<?php

require_once('stripe-php/init.php');
\Stripe\Stripe::setApiKey('sk_test_51ImUz1JXE2S1O9gfhnusET2c8xVsScxfQdkcAs8MVhHsVDRFu6cZX45rbj8Q9zMOvEwdiXhmLc80JVpV6zPYSs0N00gLy89mTT');

header('Content-Type: application/json');

$YOUR_DOMAIN = 'https://myviristore.com/admin/api/stripecheckout';

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 2000,
      'product_data' => [
        'name' => 'Stubborn Attachments',
        'images' => ["https://i.imgur.com/EHyR2nP.png"],
      ],
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => $YOUR_DOMAIN . '?success=true',
  'cancel_url' => $YOUR_DOMAIN . '?canceled=true',
]);

echo json_encode(['id' => $checkout_session->id]);
