<?php
// include("dbcon.php");
include("users.php");

if (isset($_POST["login"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql="SELECT username, password FROM users WHERE username = ?";

    $stmt=$conn->prepare($sql);

    if($stmt===false){
        die("Hiba a lekerdezes elokeszitese soran: ".$conn->error);
    }

    $stmt->bind_param("s",$username);

    if(!$stmt->execute()){
        die("Hiba a lekerdezes soran: ".$conn->error);
    }
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
    <p>Nincs fiokod?</p>
    <a href="register.php"><button>Regisztralj</button></a>
    <h2>Jelentkezz be</h2>

    <form method="POST" action="">
        Felhasznalonev: <input type="text" name="username" id=""><br><br>
        Jelszo: <input type="password" name="password" id=""><br><br>
        <input type="submit" name="login" value="Login">
    </form>
</body>

</html>