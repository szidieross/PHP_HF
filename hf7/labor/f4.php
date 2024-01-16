<?php
// Ellenőrizzük, hogy van-e már sütink a kosárhoz
$cart = isset($_COOKIE['cart']) ? json_decode($_COOKIE['cart'], true) : [];

// Ha az űrlapot elküldték (termék hozzáadása a kosárhoz)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $product = isset($_POST['product']) ? $_POST['product'] : '';

        // Ha a termék még nincs a kosárban, adjuk hozzá
        if (!in_array($product, $cart)) {
            $cart[] = $product;

            // Frissítjük a sütiket
            setcookie('cart', json_encode($cart), time() + 3600 * 24 * 30); // 30 napig érvényes
        }
    }

    // Ha az űrlapot elküldték (kosár ürítése)
    if (isset($_POST['clear_cart'])) {
        // Kosár ürítése
        $cart = [];
        setcookie('cart', '', time() - 3600); // Lejárattal azonnali ürítés
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Vásárlói Kosár Szimuláció</title>
</head>

<body>
    <h3>Vásárlói Kosár Szimuláció</h3>

    <form method="post" action="">
        <label for="product">Termék neve:</label>
        <input type="text" name="product" id="product">
        <input type="submit" name="add_to_cart" value="Kosárba helyezés">
    </form>

    <h4>Kosár tartalma:</h4>
    <ul>
        <?php foreach ($cart as $product): ?>
            <li><?php echo $product; ?></li>
        <?php endforeach; ?>
    </ul>

    <form method="post" action="">
        <input type="submit" name="clear_cart" value="Kosár ürítése">
    </form>
</body>

</html>
