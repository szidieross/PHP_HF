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

    $seconds = 45;
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


    echo "<h2>3. feladat</h2>";

    $szam1 = 7;
    $szam2 = 2;
    $osszeadas = $szam1 + $szam2;
    $kivonas = $szam1 - $szam2;
    $szorzas = $szam1 * $szam2;
    $osztas = $szam1 / $szam2;

    echo "$szam1 + $szam2 = $osszeadas<br>";
    echo "$szam1 - $szam2 = $kivonas<br>";
    echo "$szam1 * $szam2 = $szorzas<br>";
    echo "$szam1 / $szam2 = $osztas<br>";


    echo "<h2>4. feladat</h2>";

    $html = <<<HTML
<body>
    <table cellspacing="0" border="1" style="height:90px; width:90px;">
        <tr>
            <td style="background-color: black; "></td>
            <td></td>
            <td style="background-color: black; "></td>
        </tr>
        <tr>
            <td></td>
            <td style="background-color: black; "></td>
            <td></td>
        </tr>
        <tr>
            <td style="background-color: black; "></td>
            <td></td>
            <td style="background-color: black; "></td>
        </tr>
    </table>
</body>
HTML;

    echo $html;

    echo "<h2>5. feladat</h2>";
    echo "<h2>6. feladat</h2>";
    ?>
</body>

</html>