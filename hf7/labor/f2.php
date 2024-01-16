<?php
$backgroundColor = isset($_COOKIE['background_color']) ? $_COOKIE['background_color'] : '#ffffff';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $backgroundColor = isset($_POST['background_color']) ? $_POST['background_color'] : '#ffffff';
    setcookie('background_color', $backgroundColor, time() + 3600 * 24);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Felhasználói Preferenciák</title>
    <style>
        body {
            background-color: <?php echo $backgroundColor; ?>;
            color: #000000;
        }
    </style>
</head>

<body>
    <h3>Felhasználói Preferenciák</h3>

    <form method="post" action="">
        <label for="background_color">Háttérszín:</label>
        <input type="color" name="background_color" id="background_color" value="<?php echo $backgroundColor; ?>">
        <br><br>

        <input type="submit" value="Mentés">
    </form>
</body>

</html>
