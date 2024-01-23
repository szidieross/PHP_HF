<?php

include("dbcon.php");

$sql="CREATE DATABASE IF NOT EXISTS egyetem1";

if($conn->query($sql)===true){
    echo "Egyetem atadbazis sikeresen letrehozva";
}else{
    echo "Hiba az adatbazis letrehozasa soran: ". $conn->error;
}