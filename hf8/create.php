<?php

include("dbcon.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "CREATE TABLE IF NOT EXISTS hallgatok (
 id INT PRIMARY KEY,
 nev VARCHAR(255) NOT NULL,
 szak VARCHAR(255) NOT NULL,
 atlag DOUBLE NOT NULL,
)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Hiba a tabla letrehozasa soran: " . $stmt->error);
}

if (!$stmt->execute()) {
    die("Hiba a tabla letrehozasa soran: " . $stmt->error);
}

echo "A 'hallgatok' tabla sikeresen letrehozva";

$stmt->close();
$conn->close();