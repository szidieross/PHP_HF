<?php
if (isset($_COOKIE['visit_count'])) {
    $visitCount = $_COOKIE['visit_count'] + 1;
} else {
    $visitCount = 1;
}

setcookie('visit_count', $visitCount, time() + 3600 * 24);

echo "Üdvözöllek! Ez a(z) $visitCount. látogatásod.";

?>
