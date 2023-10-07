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

    ?>
    <form method="POST" action="">
        1. szam: <input type="number" name="szam1">
        <br>
        Muvelet: <input type="text" name="muvelet">
        <br>
        2. szam: <input type="number" name="szam2">
        <br>
        <input type="submit" value="Szamold ki!" name="szamol">
    </form>
    <?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['szamol'])) {
        szamoldKi();
    }

    function szamoldKi()
    {
        $szam_1 = (int) $_REQUEST["szam1"];
        $szam_2 = (int) $_REQUEST["szam2"];
        $muvelet = $_REQUEST["muvelet"];
        $eredmeny = 0;

        if ($szam_2 != 0 && ($muvelet == "+" || $muvelet == "*" || $muvelet == "-" || $muvelet == "/")) {
            switch ($muvelet) {
                case "+":
                    $eredmeny = $szam_1 + $szam_2;
                    break;
                case "-":
                    $eredmeny = $szam_1 - $szam_2;
                    break;
                case "*":
                    $eredmeny = $szam_1 * $szam_2;
                    break;
                case "/":
                    $eredmeny = $szam_1 / $szam_2;
                    break;
            }
            echo "Eredmeny: $szam_1 $muvelet $szam_2 = $eredmeny";
        } elseif ($szam_2 != 0) {
            echo "Helytelen muveleti jel.";
        } elseif ($szam_2 == 0 && $muvelet == "/") {
            echo "Nullaval valo osztas.";
        }
    }


    echo "<h2>6. feladat</h2>";
    ?>
    <form method="POST" action="">
        Honap: <input type="text" name="honap">
        <input type="submit" value="Melyik evszak?" name="evszak">
    </form>
    <?php

    if (isset($_POST["evszak"])) {
        melyikEvszak();
    }

    function melyikEvszak()
    {
        $honap = $_REQUEST['honap'];

        // IF
        if($honap=="januar" || $honap=="februar" || $honap=="december"){
            echo "Tel";
        }
        elseif($honap=="junius" || $honap=="julius" || $honap=="augusztus"){
            echo "Nyar";
        }
        elseif($honap=="szeptember" || $honap=="oktober" || $honap=="november"){
            echo "Osz";}
        elseif($honap=="marcius" || $honap=="aprilis" || $honap=="majus"){
            echo "Tavasz";
        }else{
            echo "Nincs ilyen honap.";
        }
    
        // SWITCH
        switch ($honap) {
            case "szeptember":
            case "oktober":
            case "november":
                echo "Osz";
                break;
            case "januar":
            case "februar":
            case "december":
                echo "Tel";
                break;
            case "marcius":
            case "aprilis":
            case "majus":
                echo "Tavasz";
                break;
            case "junius":
            case "julius":
            case "augusztus":
                echo "Nyar";
                break;
            default:
                echo "Nincs ilyen honap.";
        }
    }

    ?>
</body>

</html>