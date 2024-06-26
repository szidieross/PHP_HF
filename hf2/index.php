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
            }
            $table .= "</tr>";
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

    function lower_upper_case($array, $to_upper_case)
    {
        $transformed_array = array();
        if ($to_upper_case == "kisbetus") {
            foreach ($array as $key => $val) {
                $val = strtolower($val);
                $transformed_array[$key] = $val;
            }
        } elseif ($to_upper_case == "nagybetus") {
            foreach ($array as $key => $val) {
                $val = strtoupper($val);
                $transformed_array[$key] = $val;
            }
        }

        return $transformed_array;
    }
    var_dump(lower_upper_case($szinek, "kisbetus"));
    var_dump(lower_upper_case($szinek, "nagybetus"));
    echo "<br><br>";

    
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

    class Bevasarlo_Lista
    {
        public $lista = array();

        public function hozzaad(Termek $termek)
        {
            $this->lista[] = $termek;
            echo "<p>$termek->mennyiseg db $termek->nev hozzaadva</p>";
        }

        public function torol(Termek $termek)
        {
            $filteredArray = array();
            foreach ($this->lista as $elem) {
                if ($elem->nev !== $termek->nev) {
                    $filteredArray[] = $elem;
                }
            }

            $this->lista = $filteredArray;
            echo "<p>$termek->nev torolve</p>";
        }

        public function torol_db(Termek $termek, $db)
        {
            $filteredArray = array();
            for ($i = 0; $i < count($this->lista); $i++) {
                if ($this->lista[$i]->nev !== $termek->nev) {
                    $filteredArray[] = $this->lista[$i];
                }
                if ($this->lista[$i]->nev === $termek->nev) {
                    $uj_mennyiseg = $termek->mennyiseg - $db;

                    if ($uj_mennyiseg > 0) {
                        $this->lista[$i]->mennyiseg = $uj_mennyiseg;
                        $filteredArray[] = $this->lista[$i];
                        echo "<p>$db db $termek->nev torolve</p>";
                    } else {
                        echo "<p>Minden $termek->nev torolve</p>";
                    }
                }
            }

            $this->lista = $filteredArray;
        }

        public function ossz_koltseg()
        {
            $osszeg = 0;
            foreach ($this->lista as $items) {
                $osszeg += $items->egysegar * $items->mennyiseg;
            }
            return "Ossz: $osszeg";
        }

        public function kiir()
        {
            echo "<h3>Bevasarlo lista</h3><ul>";
            foreach ($this->lista as $termek) {
                echo "<li>";
                echo $termek->kiir();
                echo "</li>";
            }
            echo "</ul>";
        }
    }

    class Termek
    {
        public $nev;
        public $mennyiseg;
        public $egysegar;

        public function __construct($nev, $mennyiseg, $egysegar)
        {
            $this->nev = $nev;
            $this->mennyiseg = $mennyiseg;
            $this->egysegar = $egysegar;
        }

        public function kiir()
        {
            echo "<p>Nev: $this->nev, mennyiseg: $this->mennyiseg, egysegar: $this->egysegar</p>";
        }

        public function get_mennyiseg()
        {
            return $this->mennyiseg;
        }

        public function get_ar()
        {
            return $this->egysegar;
        }
    }

    $t1 = new Termek("Alma", 1, 1.5);
    $t2 = new Termek("Korte", 3, 2);
    $t3 = new Termek("Cipo", 1, 400);
    $t4 = new Termek("Nadrag", 3, 250);

    $l1 = new Bevasarlo_Lista();
    $l1->hozzaad($t1);
    $l1->hozzaad($t2);
    $l1->hozzaad($t3);
    $l1->hozzaad($t4);
    echo $l1->ossz_koltseg();
    $l1->kiir();
    $l1->torol($t1);
    $l1->kiir();
    $l1->torol_db($t4, 1);
    $l1->torol_db($t2, 4);
    $l1->kiir();
    echo $l1->ossz_koltseg();

    ?>
</body>

</html>