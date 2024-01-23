<?php

include("dbcon.php");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Failed to connect to database: " . $conn->connect_error);
}

$table = "hallgatok";

$sql = "SELECT id, nev, szak, atlag FROM $table";
$result = $conn->query($sql);

if ($result === false) {
    die("Hiba a lekérdezés során: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listazas</title>
</head>

<body>
    <h2>Hallgatok Listazasa</h2>

    <?php if ($result->num_rows > 0) ?>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nev</th>
                <th>Szak</th>
                <th>Atlag</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>

                <tr>
                    <td>
                        <?php echo $row["id"] ?>
                    </td>
                    <td>
                        <?php echo $row["nev"] ?>
                    </td>
                    <td>
                        <?php echo $row["szak"] ?>
                    </td>
                    <td>
                        <?php echo $row["atlag"] ?>
                    </td>
                </tr>

            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>