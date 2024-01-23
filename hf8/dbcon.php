<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test1";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}


$sql = "DROP DATABASE IF EXISTS $dbname";

if ($conn->query($sql) === true) {
    echo "A $dbname adatbázis sikeresen törölve";
} else {
    echo "Hiba az adatbázis törlése során: " . $conn->error;
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) === true) {
    echo "A $dbname adatbázis sikeresen létrehozva";
} else {
    echo "Hiba az adatbázis létrehozása során: " . $conn->error;
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS hallgatok (
    id INT PRIMARY KEY,
    nev VARCHAR(255) NOT NULL,
    szak VARCHAR(255) NOT NULL,
    atlag DOUBLE NOT NULL
)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Hiba a tábla létrehozása során: " . $conn->error);
}

if (!$stmt->execute()) {
    die("Hiba a tábla létrehozása során: " . $stmt->error);
}

echo "A 'hallgatok' tábla sikeresen létrehozva";

$stmt->close();
$conn->close();

?>
