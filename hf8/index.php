<?php
session_start();

// include("dbcon.php");
// include("hallgatok.php");
include("listazas.php");

if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit();
}

// if (!isset($_COOKIE["username"])) {
//     header("Location: login.php");
//     exit();
// }
