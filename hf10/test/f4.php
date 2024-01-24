<?php

// Fiktív adatok lekérése a fakestoreapi-ról
$usersUrl = 'https://fakestoreapi.com/users';
$cartsBaseUrl = 'https://fakestoreapi.com/carts/user/';
$productsBaseUrl = 'https://fakestoreapi.com/products';

// cURL inicializálása
$ch = curl_init();

// cURL beállítások
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// User lekérdezése
curl_setopt($ch, CURLOPT_URL, $usersUrl);
$usersResponse = json_decode(curl_exec($ch), true);

// Összes termék lekérdezése
curl_setopt($ch, CURLOPT_URL, $productsBaseUrl);
$productsResponse = json_decode(curl_exec($ch), true);

// User kosarainak összértékének számolása
foreach ($usersResponse as $user) {
    $userId = $user['id'];

    // Kosár lekérdezése
    curl_setopt($ch, CURLOPT_URL, $cartsBaseUrl . $userId);
    $cartResponse = json_decode(curl_exec($ch), true);

    $totalValue = 0;

    // Minden termék árának lekérdezése és összérték számolása
    foreach ($cartResponse as $item) {
        // Ellenőrizzük, hogy a szükséges kulcsok léteznek-e
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

    // Kiíratás
    echo "User ID: $userId, Total Cart Value: $totalValue" . PHP_EOL;

}

// cURL lezárása
curl_close($ch);
