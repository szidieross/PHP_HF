<?php
session_start();

if (isset($_SESSION["visit_number"])) {
    $_SESSION["visit_number"] += 1;
} else {
    $_SESSION["visit_number"]=1;
}

echo "hello for the " . $_SESSION["visit_number"] . " time";
?>