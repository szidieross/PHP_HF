<?php
include("dbcon.php");

$table = "hallgatok";

$sql = "CREATE TABLE IF NOT EXISTS $table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nev VARCHAR(255) NOT NULL,
    szak VARCHAR(255) NOT NULL,
    atlag DOUBLE NOT NULL
)";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Hiba a $table tábla létrehozása során: " . $conn->error);
}

if (!$stmt->execute()) {
    die("Hiba a $table tábla létrehozása során: " . $stmt->error);
}

// echo "A 'hallgatok' tábla sikeresen létrehozva";




// hallgatok beszurasa
// $sql = "INSERT INTO $table (nev, szak, atlag) VALUES (?, ?, ?)";
// $stmt = $conn->prepare($sql);

// if ($stmt === false) {
//     die("Hiba az INSERT előkészítése során: " . $conn->error);
// }

// $nev = "Luke";
// $szak = "informatika";
// $atlag = 7.5;

// $stmt->bind_param("ssd", $nev, $szak, $atlag);

// if (!$stmt->execute()) {
//     die("Hiba az adat beszúrása során: " . $stmt->error);
// }

// echo "A hallgató sikeresen beszúrva";

// $nev = "Mary";
// $szak = "informatika";
// $atlag = 9.4;

// $stmt->bind_param("ssd", $nev, $szak, $atlag);

// if (!$stmt->execute()) {
//     die("Hiba az adat beszúrása során: " . $stmt->error);
// }

// echo "A hallgató sikeresen beszúrva";

$stmt->close();
$conn->close();