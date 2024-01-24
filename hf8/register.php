<?php
include("dbcon.php");
include("users.php");
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
        Email: <input type="email" name="eail" id=""><br><br>
        Felhasznalonev: <input type="text" name="username" id=""><br><br>
        Jelszo: <input type="password" name="password" id=""><br><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>

</html>