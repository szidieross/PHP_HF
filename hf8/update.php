<?php
include("dbcon.php");

$id = isset($_GET['id']) ? $_GET['id'] : 0;

echo "ID" . $id;

$sql = "SELECT nev, atlag, szak from hallgatok WHERE id=?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Hiba a SELECT lekérdezés előkészítése során: " . $conn->error);
}

$stmt->bind_param("i", $id);

if (!$stmt->execute()) {
    die("Hiba a SELECT lekérdezés során: " . $conn->error);
}

$stmt->bind_result($nev, $atlag, $szak);

$stmt->fetch();
$stmt->close();


if (isset($_POST['update']) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $nev = $_POST['nev'];
    $szak = $_POST['szak'];
    $atlag = $_POST['atlag'];

    $sql = "UPDATE hallgatok SET nev=?, szak=?, atlag=? WHERE id=?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Hiba az UPDATE lekérdezés előkészítése során: " . $conn->error);
    }

    $stmt->bind_param("ssdi", $nev, $szak, $atlag, $id);

    if (!$stmt->execute()) {
        die("Hiba az adat frissítése során: " . $stmt->error);
    }

    echo "A hallgató sikeresen frissítve!";

    $stmt->close();

    header("Location: index.php");
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Szerkeszt</title>
</head>

<body>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nev: <input type="text" name="nev" id="" value="<?php echo $nev; ?>"><br><br>
        Szak: <input type="text" name="szak" id="" value="<?php echo $szak ?>"><br><br>
        Atlag: <input type="number" name="atlag" id="" step="0.01" value="<?php echo $atlag ?>"><br><br>
        <input type="submit" name="update" value="Ment">
    </form>
</body>

</html>