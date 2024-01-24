<?php
// include("dbcon.php");
include("users.php");

if (isset($_POST["register"]) && $_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($username) || empty($email) || empty($password)) {
        die("Hiba: Minden mező kitöltése kötelező.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Hiba: Érvénytelen e-mail cím formátum.");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Hiba: " . $conn->error);
    }

    $stmt->bind_param("sss", $username, $email, $hashedPassword);

    if (!$stmt->execute()) {
        die("Hiba: " . $conn->error);
    }

    // echo "Felhasználó létrehozva";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <p>Van fiokod?</p>
    <a href="login.php">
        <button>Jelentkezz be</button></a>
    <h2>Regisztralj</h2>

    <form method="POST" action="">
        Felhasznalonev: <input type="text" name="username" id="" required><br><br>
        Email: <input type="email" name="email" id="" required><br><br>
        Jelszo: <input type="password" name="password" id="" required><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>

</html>