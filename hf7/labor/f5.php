<?php
session_start(); // Munkamenet indítása

// Ellenőrizzük, hogy a felhasználó be van-e jelentkezve
if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    echo "Üdv, Felhasználó #$userId! <br>";
    echo '<a href="logout.php">Kijelentkezés</a>';
} else {
    // Ha nincs bejelentkezve, megjelenítjük a bejelentkezési űrlapot
    echo 'HI';
}
?>
