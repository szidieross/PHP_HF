
<?php
// include("dbcon.php");
include("hallgatok.php");
include("listazas.php");

session_start();

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}

?>