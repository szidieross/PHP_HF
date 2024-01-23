<?php

// require_once("dbcon.php");
include("dbcon.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

// Kapcsolat létrehozása
// $conn = new mysqli($servername, $username, $password);

// // Kapcsolat ellenőrzése
// if ($conn->connect_error) {
//     die("Sikertelen kapcsolódás: " . $conn->connect_error);
// }

// // Adatbázis kiválasztása vagy létrehozása
// $sql = "CREATE DATABASE IF NOT EXISTS egyetem";
// if ($conn->query($sql) === TRUE) {
//     echo "Az adatbázis létrehozva sikeresen!<br>";
// } else {
//     echo "Hiba az adatbázis létrehozásakor: " . $conn->error;
// }

$conn->select_db("egyetem");

// Tábla létrehozása
$sql = "CREATE TABLE IF NOT EXISTS hallgatok (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(30) NOT NULL,
    szak VARCHAR(30) NOT NULL,
    atlag DOUBLE
)";

if ($conn->query($sql) === TRUE) {
    echo "A tábla létrehozva sikeresen!<br>";
} else {
    echo "Hiba a tábla létrehozásakor: " . $conn->error;
}

// Adatok beszúrása
$sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES
    ('John Doe', 'Informatika', 4.5),
    ('Jane Doe', 'Matematika', 4.2)";

if ($conn->query($sql) === TRUE) {
    echo "Adatok beszúrva sikeresen!<br>";
} else {
    echo "Hiba az adatok beszúrásakor: " . $conn->error;
}

// Kapcsolat bezárása
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Új hallgató felvétele</title>
</head>
<body>
    <h2>Új hallgató felvétele</h2>
    <form action="process_hallgato.php" method="post">
        Név: <input type="text" name="nev"><br>
        Szak: <input type="text" name="szak"><br>
        Átlag: <input type="text" name="atlag"><br>
        <input type="submit" value="Felvitel">
    </form>
</body>
</html>
