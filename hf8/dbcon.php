<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}


// $sql = "DROP DATABASE IF EXISTS $dbname";

// if ($conn->query($sql) === true) {
//     echo "A $dbname adatbázis sikeresen törölve";
// } else {
//     echo "Hiba az adatbázis törlése során: " . $conn->error;
// }


$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

if ($conn->query($sql) === false) {
    echo "Hiba az adatbázis létrehozása során: " . $conn->error;
}

$conn->select_db($dbname);