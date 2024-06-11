<?php

$usersUrl = 'https://fakestoreapi.com/users';
$cartsBaseUrl = 'https://fakestoreapi.com/carts/user/';
$productsBaseUrl = 'https://fakestoreapi.com/products';

$ch = curl_init();

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_URL, $usersUrl);
$usersResponse = json_decode(curl_exec($ch), true);

curl_setopt($ch, CURLOPT_URL, $productsBaseUrl);
$productsResponse = json_decode(curl_exec($ch), true);

foreach ($usersResponse as $user) {
    $userId = $user['id'];

    curl_setopt($ch, CURLOPT_URL, $cartsBaseUrl . $userId);
    $cartResponse = json_decode(curl_exec($ch), true);

    $totalValue = 0;

    foreach ($cartResponse as $item) {
        if (isset($item['productId'], $item['quantity'])) {
            $productId = $item['productId'];
            $quantity = $item['quantity'];

            foreach ($productsResponse as $product) {
                if ($product['id'] === $productId) {
                    $price = $product['price'];
                    $totalValue += $price * $quantity;
                }
            }
        }
    }

    echo "User ID: $userId, Total Cart Value: $totalValue" . PHP_EOL;

}

curl_close($ch);
