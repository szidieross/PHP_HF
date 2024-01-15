<?php
echo "<pre>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['registration'])) {
    $errors = [];

    $name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    $email = isset($_POST["Email"]) ? trim($_POST["Email"]) : '';
    if (empty($Email)) {
        $errors[] = "Email is required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is invalid.";
    }

    $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';
    $confirmPassword = isset($_POST["confirmPassword"]) ? trim($_POST["confirmPassword"]) : '';
    if (empty($password)) {
        $errors[] = "Password is required.";
    } else if (strlen($password) < 8) {
        $errors[] = "Password needs to be at least 8 characters long.";
    } else if (!preg_match('/[A-Z]/', $password)) {
        $errors[] = "Password should contain at least one uppercase letter.";
    } else if (!preg_match('/[0-9]/', $password)) {
        $errors[] = "Password should contain at least one number.";
    } else if (!preg_match('/[^A-Za-z0-9]/', $password)) {
        $errors[] = "Password should contain at least one special character.";
    }
    if ($password !== $confirmPassword) {
        $errors[] = "Could not confirm password.";
    }

    $birthDate = isset($_POST["birthDate"]) ? $_POST["birthDate"] : null;
    if (empty($birthdate)) {
        $errors[] = "Birthdate is required.";
    } else {
        $dateObj = DateTime::createFromFormat('Y-m-d', $birthdate);
        $isValidDate = $dateObj && $dateObj->format('Y-m-d') === $birthdate;
        if (!$isValidDate) {
            $errors[] = "Invalid birthdate format. Use YYYY-MM-DD.";
        }
    }

    echo $birthDate . '<br/>';

    var_dump($errors);
}


echo "</pre>";
?>