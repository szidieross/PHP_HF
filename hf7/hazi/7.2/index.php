<?php
session_start();



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
            <li>
                <?php echo $product; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <form method="post" action="">
        <input type="submit" name="clear_cart" value="Kosár ürítése">
    </form>
</body>

</html>