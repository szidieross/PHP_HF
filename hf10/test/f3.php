<?php

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://fakestoreapi.com/products');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec($ch);

curl_close($ch);

$products = json_decode($response, true);

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
