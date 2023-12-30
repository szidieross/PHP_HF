<?php
echo "<pre>";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {

    $firstName = isset($_POST["firstName"]) ? $_POST["firstName"] : '';
    $lastName = isset($_POST["lastName"]) ? $_POST["lastName"] : '';
    $email = isset($_POST["email"]) ? $_POST["email"] : '';
    $attend = isset($_POST["attend"]) ? $_POST["attend"] : [];
    $tshirt = isset($_POST["tshirt"]) ? $_POST["tshirt"] : '';
    $abstractFile = isset($_FILES['abstract']) ? $_FILES['abstract'] : '';
    $terms = isset($_POST["terms"]);

    if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] === UPLOAD_ERR_OK) {
        $abstractFile = $_FILES['abstract'];

    } else {
        echo "Error uploading file.";
    }
    
    echo "$firstName\n";
    echo "$tshirt\n";
    var_dump($attend);
    var_dump($abstractFile);
    echo "\n" . $terms;
}
echo "</pre>";
?>