<!DOCTYPE html>
<html>

<head>
    <style>
        .kek {
            background-color: lightblue;
        }

        .piros {
            color: red;
        }

        .bold {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <?php
    echo "<h2>1. feladat</h2>";

    $szorzo_tabla = function ($n) {
        $table = "<table border='1'>";
        for ($i = 1; $i <= $n; $i++) {
            $table .= "<tr>";
            for ($j = 1; $j <= $n; $j++) {
                $szorzat = $i * $j;
                if ($i === $j) {
                    $table .= "<td class='kek'> $szorzat </td>";
                } else {
                    $table .= "<td> $szorzat </td>";
                }
                // echo "$szorzat ";
            }
            $table .= "</tr>";

            // echo "<br>";
        }
        $table .= "</table>";
        return $table;
    };
    echo $szorzo_tabla(10);


    echo "<h2>2. feladat</h2>";

    $orszagok = array(
        " Magyarország " => " Budapest",
        " Románia" => " Bukarest",
        "Belgium" => "Brussels",
        "Austria" => "Vienna",
        "Poland" => "Warsaw"
    );

    foreach ($orszagok as $orszag => $fovaros) {
        echo "<p>$orszag fővárosa <span class='piros'>$fovaros</span></p>";
    }


    echo "<h2>3. feladat</h2>";

    $napok = array(
        "HU" => array("H", "K", "Sze", "Cs", "P", "Szo", "V"),
        "EN" => array("M", "Tu", "W", "Th", "F", "Sa", "Su"),
        "DE" => array("Mo", "Di", "Mi", "Do", "F", "Sa", "So"),
    );

    foreach ($napok as $nyelv => $het) {
        $sor = "<span>$nyelv:</span>";
        for ($i = 0; $i < count($het); $i++) {
            if ($i == count($het) - 1) {
                $sor .= "<span> $het[$i]</span>";
            } elseif ($i % 2 == 1) {
                $sor .= "<span class='bold'> $het[$i]</span>";
            } else {
                $sor .= "<span> $het[$i],</span>";
            }
        }
        echo "$sor<br>";
    }


    echo "<h2>4. feladat</h2>";

    $szinek = array('A' => 'Kek', 'B' => 'Zold', 'c' => 'Piros');

    //classic
    function lower_upper_case($array, $to_upper_case = false)
    {
        $transformed_array = array();
        if ($to_upper_case == false) {
            foreach ($array as $key => $val) {
                $val = strtolower($val);
                $transformed_array[$key] = $val;
            }
        } else {
            foreach ($array as $key => $val) {
                $val = strtoupper($val);
                $transformed_array[$key] = $val;
            }
        }

        return $transformed_array;
    }
    var_dump(lower_upper_case($szinek, false));
    var_dump(lower_upper_case($szinek, true));
    echo "<br><br>";

    //array_map
    
    function to_lower_case($value)
    {
        return strtolower($value);
    }

    function to_upper_case($value)
    {
        return strtoupper($value);
    }

    $transformed_array = array_map("to_lower_case", $szinek);
    var_dump($transformed_array);

    $transformed_array = array_map("to_upper_case", $szinek);
    var_dump($transformed_array);


    echo "<h2>5. feladat</h2>";
    ?>
</body>

</html>