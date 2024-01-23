<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

// Kapcsolat létrehozása
$conn = new mysqli($servername, $username, $password, $dbname );

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}

// Űrlap adatok feldolgozása
$nev = $_POST["nev"];
$szak = $_POST["szak"];
$atlag = $_POST["atlag"];

// Adatok beszúrása
$sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES ('$nev', '$szak', $atlag)";

if ($conn->query($sql) === TRUE) {
    echo "Adatok beszúrva sikeresen!<br>";
} else {
    echo "Hiba az adatok beszúrásakor: " . $conn->error;
}

// Kapcsolat bezárása
$conn->close();
?>
