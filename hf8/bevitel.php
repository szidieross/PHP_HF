<?php
include("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add"])) {

    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $sql = "INSERT INTO hallgatok (nev, szak, atlag) VALUES (?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Hiba az INSERT lekérdezés előkészítése során: " . $conn->error);
    }

    $stmt->bind_param("ssd", $nev, $szak, $atlag);

    if (!$stmt->execute()) {
        die("Hiba az adatok beszúrása során: " . $stmt->error);
    }

    echo "A hallgató sikeresen felvéve!";

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bevitel</title>
</head>

<body>
    <br>
    <a href="index.php"><button>Jelenlegi hallgatok</button></a>

    <h2>Bevitel</h2>

    <form method="POST" action="">
        Nev: <input type="text" name="nev" id="">
        Szak: <input type="text" name="szak" id="">
        Atlag: <input type="number" name="atlag" id="" step="0.1">
        <input type="submit" name="add" value="Hozzaad">
    </form>
</body>

</html>