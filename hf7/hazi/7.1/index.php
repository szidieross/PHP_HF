<?php

if (!isset($_COOKIE["rnd_number"])) {
    setcookie("rnd_number", rand(1, 10), time() + 3600);
}

if (isset($_GET['submit_guess'])) {
    $guess = isset($_GET['rnd']) ? (int)$_GET['rnd'] : 0;

    if ($guess >= 1 && $guess <= 10) {
        if ($guess == $_COOKIE["rnd_number"]) {
            echo "Congratulations! The correct number is: " . $_COOKIE["rnd_number"];
            echo "<br>New game";
            
            setcookie("rnd_number", "", time() - 3600);
            setcookie("rnd_number", rand(1, 10), time() + 3600);
        } else if($guess < $_COOKIE["rnd_number"]) {
            echo "It is bigger than $guess, try again!";
        } else  {
            echo "It is smaller than $guess, try again!";
        }
    } else {
        echo "Please enter a number between 1 and 10.";
    }
}

?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Guessing</title>
</head>

<body>
    <form action="" method="GET">
        <label for="rnd">Guess the number form 1 to 10:</label><br />
        <input type="text" id="rnd" name="rnd">
        <input type="submit" name="submit_guess" value="Guess">
    </form>
</body>

</html>