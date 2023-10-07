<!DOCTYPE html>
<html>

<body>
    <?php
    echo "<h2>1. feladat</h2>";
    $numbers = array(5, '5', '05', 12.3, '16.7', 'five', 'true', 0xDECAFBAD, '10e200');
    foreach ($numbers as $number) {
        echo gettype($number);
        if (is_numeric($number))
            echo " Igen<br>";
        else {
            echo " Nem<br>";
        }
    }


    echo "<h2>2. feladat</h2>";
    ?>
    <form method="post" action="">
        Seconds: <input type="text" name="fseconds">
        <input type="submit" name="seconds">
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['seconds'])) {
        // Call the function when the form is submitted
        secondsToHours();
    }

    

    function secondsToHours()
    {
        $seconds = $_POST['fseconds'];
        if (is_numeric($seconds) && is_int($seconds + 0)) {
            $hours = (int) $seconds / 60;
            if ($hours <= 1) {
                echo "<h3>$hours hour</h3>";
            } else {
                echo "<h3>$hours hours</h3>";
            }
        } elseif (is_numeric($seconds)) {
            echo "Egesz szamot irjon be.";
        } else {
            echo "Szamot irjon be.";
        }
    }




    echo "<h2>3. feladat</h2>";
    echo "<h2>4. feladat</h2>";
    echo "<h2>5. feladat</h2>";
    echo "<h2>6. feladat</h2>";
    ?>
</body>

</html>