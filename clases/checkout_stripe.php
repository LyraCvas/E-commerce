<?php

require_once '../stripe/init.php';
require_once '../clases/secrets_stripe.php';

$stripe = new \Stripe\StripeClient($stripeSecretKey);

header('Content-Type: application/json');

$intent = \Stripe\PaymentIntent::create([
    'amount' => $total, // Monto en centavos (ejemplo: 10 dólares)
    'currency' => 'usd',
    'description' => 'Compra en tu ecommerce',
]);

// Devuelve el secreto del cliente al frontend
echo json_encode(['client_secret' => $intent->client_secret]);


try {
    // retrieve JSON from POST body
    $jsonStr = file_get_contents('php://input');
    $jsonObj = json_decode($jsonStr);

    // Create a PaymentIntent with amount and currency
    $paymentIntent = $stripe->paymentIntents->create([
        'amount' => $jsonObj,
        'currency' => 'usd',
        // In the latest version of the API, specifying the `automatic_payment_methods` parameter is optional because Stripe enables its functionality by default.
        'automatic_payment_methods' => [
            'enabled' => true,
        ],
    ]);

    $output = [
        'clientSecret' => $paymentIntent->client_secret,
    ];

    echo json_encode($output);
} catch (Error $e) {
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
}
?>