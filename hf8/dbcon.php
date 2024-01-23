<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}

$conn->select_db($dbname);

// $sql = "DROP DATABASE IF EXISTS $dbname";

// if ($conn->query($sql) === true) {
//     echo "A $dbname adatbázis sikeresen törölve";
// } else {
//     echo "Hiba az adatbázis törlése során: " . $conn->error;
// }

// $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

// if ($conn->query($sql) === true) {
//     echo "A $dbname adatbázis sikeresen létrehozva";
// } else {
//     echo "Hiba az adatbázis létrehozása során: " . $conn->error;
// }

// $conn->select_db($dbname);

// $table = "hallgatok";

// $sql = "CREATE TABLE IF NOT EXISTS $table (
//     id INT PRIMARY KEY,
//     nev VARCHAR(255) NOT NULL,
//     szak VARCHAR(255) NOT NULL,
//     atlag DOUBLE NOT NULL
// )";

// $stmt = $conn->prepare($sql);

// if ($stmt === false) {
//     die("Hiba a $table tábla létrehozása során: " . $conn->error);
// }

// if (!$stmt->execute()) {
//     die("Hiba a $table tábla létrehozása során: " . $stmt->error);
// }

// echo "A 'hallgatok' tábla sikeresen létrehozva";

// // hallgatok beszurasa
// $sql = "INSERT INTO $table (id, nev, szak, atlag) VALUES (?, ?, ?, ?)";
// $stmt = $conn->prepare($sql);

// if ($stmt === false) {
//     die("Hiba az INSERT előkészítése során: " . $conn->error);
// }

// $id = 1;
// $nev = "Luke";
// $szak = "Informatika";
// $atlag = 7.5;

// $stmt->bind_param("issd", $id, $nev, $szak, $atlag);

// if (!$stmt->execute()) {
//     die("Hiba az adat beszúrása során: " . $stmt->error);
// }

// echo "A hallgató sikeresen beszúrva";

// $id = 2;
// $nev = "Mary";
// $szak = "informatika";
// $atlag = "9.4";

// $stmt->bind_param("issd", $id, $nev, $szak, $atlag);

// if (!$stmt->execute()) {
//     die("Hiba az adat beszúrása során: " . $stmt->error);
// }

// echo "A hallgató sikeresen beszúrva";

// $stmt->close();
// $conn->close();

?>