<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Online Conference Registration</title>
</head>

<body>
    <h3>Online conference registration</h3>

    <form method="GET" action="" enctype="multipart/form-data">
        <label for="fname"> First name:
            <input type="text" name="firstName"
                value="<?php echo isset($_GET['firstName']) ? htmlspecialchars($_GET['firstName']) : ''; ?>">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
                $firstName = isset($_GET["firstName"]) ? $_GET["firstName"] : "";

                if (empty($firstName)) {
                    echo "<div style='color: red;'>Firstname is required.</div>";
                }
            }
            ?>
        </label>
        <br><br>
        <label for="lname"> Last name:
            <input type="text" name="lastName"
                value="<?php echo isset($_GET['lastName']) ? htmlspecialchars($_GET['lastName']) : ''; ?>">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
                $lastName = isset($_GET["lastName"]) ? $_GET["lastName"] : "";

                if (empty($lastName)) {
                    echo "<div style='color:red;'>Lastname is required.</div>";
                }
            }
            ?>
        </label>
        <br><br>
        <label for="email"> E-mail:
            <input type="text" name="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : '' ?>">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
                $email = isset($_GET["email"]) ? $_GET["email"] : "";

                if (empty($email)) {
                    echo "<div style='color:red;'>Email is required.</div>";
                } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<div style='color:red;'>Email is invalid.</div>";
                }
            }
            ?>
        </label>
        <br><br>
        <label for="attend"> I will attend:<br>
            <input type="checkbox" name="attend[]" value="Event1" <?php if (isset($_GET['attend']) && in_array('Event1', $_GET['attend']))
                echo 'checked'; ?>>Event 1<br>
            <input type="checkbox" name="attend[]" value="Event2" <?php if (isset($_GET['attend']) && in_array('Event2', $_GET['attend']))
                echo 'checked'; ?>>Event2<br>
            <input type="checkbox" name="attend[]" value="Event3" <?php if (isset($_GET['attend']) && in_array('Event3', $_GET['attend']))
                echo 'checked'; ?>>Event2<br>
            <input type="checkbox" name="attend[]" value="Event4" <?php if (isset($_GET['attend']) && in_array('Event4', $_GET['attend']))
                echo 'checked'; ?>>Event3<br>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
                $attend = isset($_GET["attend"]) ? $_GET["attend"] : [];

                if (empty($attend)) {
                    echo "<div style='color:red;'>At least one attendance is required.</div>";
                }
            }
            ?>
        </label>
        <br><br>
        <label for="tshirt"> What's your T-Shirt size?<br>
            <select name="tshirt">
                <option value="P">Please select</option>
                <option value="S" <?php if (isset($_GET['tshirt']) && $_GET['tshirt'] == 'S')
                    echo 'selected'; ?>>S
                </option>
                <option value="M" <?php if (isset($_GET['tshirt']) && $_GET['tshirt'] == 'M')
                    echo 'selected'; ?>>M
                </option>
                <option value="L" <?php if (isset($_GET['tshirt']) && $_GET['tshirt'] == 'L')
                    echo 'selected'; ?>>L
                </option>
                <option value="XL" <?php if (isset($_GET['tshirt']) && $_GET['tshirt'] == 'XL')
                    echo 'selected'; ?>>XL
                </option>
            </select>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
                $tshirt = isset($_GET["tshirt"]) ? $_GET["tshirt"] : '';

                if (empty($tshirt) || $tshirt == "P") {
                    echo "<div style='color:red;'>Please select you T-shirt size.</div>";
                }
            }
            ?>
        </label>
        <br><br>
        <label for="abstract"> Upload your abstract<br>
            <input type="file" name="abstract" />
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
                $abstract = isset($_FILES["abstract"]) ? $_FILES["abstract"] : '';

                if (empty($abstract['name'])) {
                    echo "<div style='color:red;'>Please select your abstract file.</div>";
                }
            }
            ?>
        </label>
        <br><br>
        <input type="checkbox" name="terms" <?php if (isset($_GET['terms']))
            echo 'checked'; ?>>I agree to terms &
        conditions.<br>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
            $terms = isset($_GET["terms"]) ? $_GET["terms"] : '';

            if (empty($terms)) {
                echo "<div style='color:red;'>Please accept our terms & conditions</div>";
            }
        }
        ?>
        <br><br>
        <input type="submit" name="submit" value="Send registration" />
    </form>

    <?php

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["submit"])) {
        $errors = [];

        $firstName = isset($_GET["firstName"]) ? $_GET["firstName"] : "";

        if (empty($firstName)) {
            $errors[] = "Firstname is required.";
        }

        $lastName = isset($_GET["lastName"]) ? $_GET["lastName"] : "";

        if (empty($firstName)) {
            $errors[] = "Lastname is required.";
        }


        foreach ($errors as $error) {
            echo $error . "\n\n";
        }
    }
    ?>
</body>

</html>