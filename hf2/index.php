<!DOCTYPE html>
<html>

<head>
    <style>
        .kek {
            background-color: lightblue;
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
    echo "<h2>3. feladat</h2>";
    echo "<h2>4. feladat</h2>";
    echo "<h2>5. feladat</h2>";
    ?>
</body>

</html>