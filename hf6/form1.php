<?php
echo "<pre>";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $errors = [];

    $firstName = isset($_POST["firstName"]) ? trim($_POST["firstName"]) : '';
    if (empty($firstName)) {
        $errors[] = "First name is required.";
    }

    $lastName = isset($_POST["lastName"]) ? trim($_POST["lastName"]) : '';
    if (empty($lastName)) {
        $errors[] = "Last name is required.";
    }

    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    if (empty($email)) {
        $errors[] = "Email is required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is invalid.";
        echo "not a valid email";
    }

    $attend = isset($_POST["attend"]) ? $_POST["attend"] : [];
    if (empty($attend)) {
        $errors[] = "At least one event must be selected.";
    }

    $tshirt = isset($_POST["tshirt"]) ? $_POST["tshirt"] : '';
    $abstractFile = isset($_FILES['abstract']) ? $_FILES['abstract'] : '';

    if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] === UPLOAD_ERR_OK) {
        $abstractFile = $_FILES['abstract'];
    } else {
        $errors[] = "Error uploading file.";
    }

    $terms = isset($_POST["terms"]);
    if (!$terms) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    echo "$firstName\n";
    echo "$tshirt\n";
    var_dump($attend);
    var_dump($abstractFile);
    echo "\n" . $terms;

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            throw new Exception($error);
        }
    }
}
echo "</pre>";
?>