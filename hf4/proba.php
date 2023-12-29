<?php
// $GLOBALS kiíratása
// echo '<pre>';
// print_r($GLOBALS);
// echo '</pre>';

// $_SERVER táblázatos formában
// echo '<table border="1">';
// echo '<tr><th>Kulcs</th><th>Érték</th></tr>';
// foreach ($_SERVER as $key => $value) {
//     echo "<tr><td>{$key}</td><td>{$value}</td></tr>";
// }
// echo '</table>';
?>

<?php
// Ellenőrizzük, hogy a felhasználó kattintott-e a kosárba helyezés gombra
if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id']; // Termék azonosítója, amit a kosárba rakunk

    // Ellenőrizzük, hogy van-e már kosár sütink
    if(isset($_COOKIE['cart'])) {
        $cart = $_COOKIE['cart'];
        $cart = json_decode($cart, true); // Konvertáljuk a JSON stringet tömbbé
    } else {
        $cart = array(); // Ha nincs kosár sütink, létrehozunk egy üres tömböt
    }

    // Hozzáadjuk az új terméket a kosárhoz
    if(array_key_exists($product_id, $cart)) {
        $cart[$product_id] += 1; // Ha már van ilyen termék a kosárban, növeljük a darabszámát
    } else {
        $cart[$product_id] = 1; // Ha még nincs ilyen termék a kosárban, hozzáadjuk
    }

    // Átalakítjuk a kosarat JSON formátumba és beállítjuk a sütiket
    $cart_json = json_encode($cart);
    setcookie('cart', $cart_json, time() + (86400 * 30)); // 30 napig tart az élettartam
}

// HTML rész, ahol a termékeket megjelenítjük és lehetőség van azokat a kosárba rakni
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vásárlói Kosár Szimuláció</title>
</head>
<body>

<h1>Termékek</h1>
<!-- Példa termékek és kosárba rakás gomb -->
<div>
    <p>Termék neve 1 - Ár: $10</p>
    <form method="post">
        <input type="hidden" name="product_id" value="product1">
        <input type="submit" name="add_to_cart" value="Kosárba">
    </form>
</div>

<div>
    <p>Termék neve 2 - Ár: $15</p>
    <form method="post">
        <input type="hidden" name="product_id" value="product2">
        <input type="submit" name="add_to_cart" value="Kosárba">
    </form>
</div>

<!-- Kosár tartalma -->
<h2>Kosár tartalma</h2>
<?php
if(isset($_COOKIE['cart'])) {
    $cart_content = json_decode($_COOKIE['cart'], true);

    echo "<ul>";
    foreach($cart_content as $product => $quantity) {
        echo "<li>$product - Mennyiség: $quantity</li>";
    }
    echo "</ul>";
} else {
    echo "<p>A kosár üres</p>";
}
?>

</body>
</html>
