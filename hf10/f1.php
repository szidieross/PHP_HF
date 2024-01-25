<?php

function getCartDetails($userId)
{
    $cartUrl = "https://fakestoreapi.com/carts/user/{$userId}";
    $productsUrl = "https://fakestoreapi.com/products";

    $cartData = fetchData($cartUrl);
    $productsData = fetchData($productsUrl);
    $totalPrice = calculateTotalPrice($cartData, $productsData);

    echo "Az {$userId}-es felhasználó kosarának összértéke: {$totalPrice} USD";
}

function fetchData($url)
{
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return json_decode($response, true);
}

function calculateTotalPrice($cartData, $productsData)
{
    $totalPrice = 0;

    foreach ($cartData as $cart) {
        foreach ($cart["products"] as $product) {
            $productId = $product['productId'];
            $quantity = $product['quantity'];

            $selectedProduct = findProductById($productId, $productsData);

            if ($selectedProduct) {
                $productPrice = $selectedProduct['price'];
                $totalPrice += $productPrice * $quantity;
            }
        }
    }
    return $totalPrice;
}

function findProductById($productId, $productsData)
{
    foreach ($productsData as $product) {
        if ($product["id"] == $productId) {
            return $product;
        }
    }
    return null;
}

getCartDetails(1);