<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test3";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";


if($conn->query($sql)===true){
    echo "A $dbname atadbazis sikeresen letrehozva";
}else{
    echo "Hiba az adatbazis letrehozasa soran: ". $conn->error;
}

$conn->close();