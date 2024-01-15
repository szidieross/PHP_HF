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

        $fileExtension = pathinfo($abstractFile['name'], PATHINFO_EXTENSION);
        if ($fileExtension !== "pdf") {
            $errors[] = "Only PDF files are allowed to be uploaded";
        }

        $maxFileSize = 3 * 1024 * 1024;
        if ($abstractFile['size'] > $maxFileSize) {
            $errors[] = "File size can't exceed 3MB";
        }

        // $tempFilePath = '' . $abstractFile['tmp_name'];
        // $destination = './files/' . $abstractFile['name'];

        // if (move_uploaded_file($tempFilePath, $destination)) {
        //     echo '<iframe src="' . $destination . '" width="100%" height="500px"></iframe>';
        // }
    } else {
        $errors[] = "Error uploading file.";
    }

    // when uploading a picture
    // if (isset($_FILES['abstract']) && $_FILES['abstract']['error'] === UPLOAD_ERR_OK) {
    //     $abstractFile = $_FILES['abstract'];
    //     $tempFilePath = $abstractFile['tmp_name'];

    //     // Path where you want to save the uploaded file temporarily
    //     $destination = './files/' . $abstractFile['name'];

    //     // Move the uploaded file to the desired location
    //     if (move_uploaded_file($tempFilePath, $destination)) {
    //         // Display the uploaded image using an <img> tag
    //         echo '<img src="' . $destination . '" alt="Uploaded Abstract Image">';
    //     } else {
    //         $errors[] = "Error moving the uploaded file.";
    //     }
    // } else {
    //     $errors[] = "Error uploading file.";
    // }

    $terms = isset($_POST["terms"]);
    if (!$terms) {
        $errors[] = "You must agree to the terms and conditions.";
    }

    if (count($errors) > 0) {
        foreach ($errors as $error) {
            throw new Exception($error);
        }
    } else {
        echo "<table><tr><td>Firstname</td>";
        echo "<td>$firstName</td></tr>";
        echo "<tr><td>Lastname</td>";
        echo "<td>$lastName</td></tr>";
        echo "<tr><td>Email</td>";
        echo "<td>$email</td></tr>";
        echo "<tr><td>Attended Events</td>";
        echo "<td>";
        foreach ($attend as $event) {
            echo "$event\t";
        }
        echo "</tr>";
        echo "<tr><td>T-shirt</td>";
        echo "<td>$tshirt</td></tr>";
        echo "<tr><td>Abstract</td>";

        $tempFilePath = '' . $abstractFile['tmp_name'];
        $destination = './files/' . $abstractFile['name'];

        if (move_uploaded_file($tempFilePath, $destination)) {
            echo '<iframe src="' . $destination . '" width="100%" height="500px"></iframe>';
        }

        echo "</table";
    }
}
echo "</pre>";
?>