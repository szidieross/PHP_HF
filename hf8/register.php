<?php
// include("dbcon.php");
include("users.php");

if (isset($_POST["register"]) && $_SERVER['REQUEST_METHOD'] === "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql="INSERT INTO users () VALUES (?, ?, ?)";
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
        Felhasznalonev: <input type="text" name="username" id=""><br><br>
        Email: <input type="email" name="email" id=""><br><br>
        Jelszo: <input type="password" name="password" id=""><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>

</html>