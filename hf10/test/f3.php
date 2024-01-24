<?php

// cURL inicializálása
$ch = curl_init();

// cURL beállítások
curl_setopt($ch, CURLOPT_URL, 'https://fakestoreapi.com/products');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// cURL kérés végrehajtása és válasz elmentése
$response = curl_exec($ch);

// cURL lezárása
curl_close($ch);

// JSON dekódolása
$products = json_decode($response, true);

// Táblázat kiíratása
echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Price</th>
            <th>Category</th>
            <th>Description</th>
        </tr>";

foreach ($products as $product) {
    echo "<tr>
            <td>{$product['id']}</td>
            <td>{$product['title']}</td>
            <td>{$product['price']}</td>
            <td>{$product['category']}</td>
            <td>{$product['description']}</td>
          </tr>";
}

echo "</table>";
