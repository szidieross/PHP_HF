<?php
$loggedIn = isset($_COOKIE['user_logged_in']) && $_COOKIE['user_logged_in'] === 'true';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) {
        setcookie('user_logged_in', 'true', time() + 3600 * 24 * 30);
        $loggedIn = true;
    } elseif (isset($_POST['logout'])) {
        setcookie('user_logged_in', '', time() - 3600);
        $loggedIn = false;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Beléptető Alkalmazás</title>
</head>

<body>
    <?php if ($loggedIn): ?>
        <h3>Üdvözöllek, te már be vagy lépve!</h3>
        <form method="post" action="">
            <input type="submit" name="logout" value="Kilépés">
        </form>
    <?php else: ?>
        <h3>Kérlek, jelentkezz be!</h3>
        <form method="post" action="">
            <input type="submit" name="login" value="Belépés">
        </form>
    <?php endif; ?>
</body>

</html>
