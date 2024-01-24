<?php

include("dbcon.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {

    $id = $_GET['id'];

    $sql = "DELETE FROM hallgatok WHERE id=?";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Hiba a DELETE lekérdezés előkészítése során: " . $conn->error);
    }

    $stmt->bind_param("i", $id);

    if (!$stmt->execute()) {
        die("Hiba az adat törlése során: " . $stmtDelete->error);
    }

    header("Location: index.php");
}