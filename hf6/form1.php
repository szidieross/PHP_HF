<?php
echo "<pre>";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $attend = $_POST["attend"] ?? [];
    $tshirt = $_POST["tshirt"];
    $abstract=$_POST["abstract"];
    // $abstract=$_FILES["abstract"];
    $terms=isset($_POST["terms"]);

    echo "$firstName\n";
    echo "$tshirt\n";
    var_dump($attend);
    var_dump($abstract);
    echo "\n".$terms;
}
echo "</pre>";
?>