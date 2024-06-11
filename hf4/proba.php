<?php
if(isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];

    if(isset($_COOKIE['cart'])) {
        $cart = $_COOKIE['cart'];
        $cart = json_decode($cart, true);
    } else {
        $cart = array();
    }

    if(array_key_exists($product_id, $cart)) {
        $cart[$product_id] += 1;
    } else {
        $cart[$product_id] = 1;
    }

    $cart_json = json_encode($cart);
    setcookie('cart', $cart_json, time() + (86400 * 30));
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Vásárlói Kosár Szimuláció</title>
</head>
<body>

<h1>Termékek</h1>
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
