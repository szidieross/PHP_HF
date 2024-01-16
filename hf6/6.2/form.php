<?php
echo "<pre>";

if ($_SERVER['REQUEST_METHOD'] == 'POST' and isset($_POST['registration'])) {
    $errors = [];

    $name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    if (empty($email)) {
        $errors[] = "Email is required.";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Email is invalid.";
    }


    // password bc im lazy = Aaaaaa1&

    // $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';
    // $confirmPassword = isset($_POST["confirmPassword"]) ? trim($_POST["confirmPassword"]) : '';
    // if (empty($password)) {
    //     $errors[] = "Password is required.";
    // } else if (strlen($password) < 8) {
    //     $errors[] = "Password needs to be at least 8 characters long.";
    // } else if (!preg_match('/[A-Z]/', $password)) {
    //     $errors[] = "Password should contain at least one uppercase letter.";
    // } else if (!preg_match('/[0-9]/', $password)) {
    //     $errors[] = "Password should contain at least one number.";
    // } else if (!preg_match('/[^A-Za-z0-9]/', $password)) {
    //     $errors[] = "Password should contain at least one special character.";
    // }
    // if ($password !== $confirmPassword) {
    //     $errors[] = "Could not confirm password.";
    // }

    $birthDate = isset($_POST["birthDate"]) ? $_POST["birthDate"] : null;
    if (empty($birthDate)) {
        $errors[] = "BirthDate is required.";
    } else {
        $dateObj = DateTime::createFromFormat('Y-m-d', $birthDate);

        $today = date("Y-m-d");
        $todayDateObj = new DateTime($today);

        if ($dateObj > $todayDateObj) {
            $errors[] = "Invalid birthdate.";
        }

        $isValidDate = $dateObj && $dateObj->format('Y-m-d') === $birthDate;
        if (!$isValidDate) {
            $errors[] = "Invalid birthdate format. Use YYYY-MM-DD.";
        }
    }

    $gender = isset($_POST["gender"]) ? $_POST["gender"] : "";
    if (empty($gender)) {
        $errors[] = "Gender is required.";
    }

    $interests = isset($_POST["interests"]) ? $_POST["interests"] : [];

    $country = isset($_POST["country"]) ? $_POST["country"] : "";

    if (count($errors) > 0) {
        echo "Errors:\n";
        foreach ($errors as $error) {
            echo "\t" . $error . "<br/>";
        }
    } else {
        echo "Név: " . $name . "<br/>";
        echo "E-mail: " . $email . "<br/>";
        echo "Születési dátum: " . $birthDate . "<br/>";
        echo "Nem: " . $gender . "<br/>";
        echo "Érdeklődési területek: ";
        if (!empty($interests)) {
            echo "<ul>";
            foreach ($interests as $interest) {
                echo "<li>" . $interest . "</li>";
            }
            echo "<ul/>";
        }
        if (!empty($country)) {
            echo "Ország: " . $country . "<br/>";
        }
    }
}


echo "</pre>";
?>