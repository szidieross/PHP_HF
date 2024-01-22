<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "egyetem";

// Kapcsolat létrehozása
$conn = new mysqli($servername, $username, $password, $dbname);

// Kapcsolat ellenőrzése
if ($conn->connect_error) {
    die("Sikertelen kapcsolódás: " . $conn->connect_error);
}

// Adatok lekérdezése
$sql = "SELECT * FROM hallgatok";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'><tr><th>ID</th><th>Név</th><th>Szak</th><th>Átlag</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["nev"]."</td><td>".$row["szak"]."</td><td>".$row["atlag"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "Nincs eredmény.";
}

$conn->close();
?>
