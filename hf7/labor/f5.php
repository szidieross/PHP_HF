<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    echo "Üdv, Felhasználó #$userId! <br>";
    echo '<a href="logout.php">Kijelentkezés</a>';
} else {
    echo 'HI';
}
?>
