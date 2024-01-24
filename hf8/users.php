<?php
include("dbcon.php");

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Hiba a 'users' tábla létrehozása során: " . $conn->error);
}

if (!$stmt->execute()) {
    die("Hiba a 'users' tábla létrehozása során: " . $stmt->error);
}

echo "A 'users' tábla sikeresen létrehozva";


?>