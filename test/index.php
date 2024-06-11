<?php
if (isset($_GET['elkuld'])) {
    $color = isset($_COOKIE['form_color']) ? $_COOKIE['form_color'] : 'black';

    $errors = [];
    $id = $_GET['id'] ?? '';
    $nev = $_GET['nev'] ?? '';
    $egyenleg = $_GET['egyenleg'] ?? '';
    $szamlatipus = $_GET['szamlatipus'] ?? '';
    $feltetel = isset($_GET['feltetel']);
    $szin = $_GET["szin"];

    if (empty($id) || !is_numeric($id)) {
        $errors[] = 'Számlaszám hibás vagy üres!';
    }

    if (empty($nev)) {
        $errors[] = 'Név mező üres!';
    }

    if (empty($egyenleg) || !is_numeric($egyenleg)) {
        $errors[] = 'Egyenleg hibás vagy üres!';
    }

    if (empty($errors) && $feltetel) {
        $koszontoSzoveg = ($szamlatipus === 'takarek') ? 'Üdvözöllek a TakarékBankban' : 'Üdvözöllek a HitelBankban';

        echo "<p style=\"color:$color;\"><strong>Számlaszám:</strong> $id</p>";
        echo "<p style=\"color:$color;\"><strong>Név:</strong> $nev</p>";
        echo "<p style=\"color:$color;\"><strong>Egyenleg:</strong> $egyenleg</p>";
        echo "<p style=\"color:$color;\"><strong>Számlatípus:</strong> $szamlatipus</p>";
        echo "<p style=\"color:$color;\"><strong>Feltétel elfogadva:</strong> " . ($feltetel ? 'Igen' : 'Nem') . "</p>";
        echo "<p style=\"color:$color;\">$koszontoSzoveg</p>";
    } else {
        echo "<p style=\"color:red;\">Hibaüzenetek:</p>";
        foreach ($errors as $error) {
            echo "<p style=\"color:red;\">$error</p>";
        }
    }
}
?>

<form action="" method="GET">
    Számlaszám: <input type="text" name="id" value="<?php echo $_GET['id'] ?? ''; ?>"><br>
    Név: <input type="text" name="nev" value="<?php echo $_GET['nev'] ?? ''; ?>"><br>
    Egyenleg: <input type="text" name="egyenleg" value="<?php echo $_GET['egyenleg'] ?? ''; ?>"><br>
    Szamla típusa:
    <input type="radio" name="szamlatipus" value="takarek" <?php echo ($_GET['szamlatipus'] ?? '') === 'takarek' ? 'checked' : ''; ?>> Takarék
    <input type="radio" name="szamlatipus" value="hitel" <?php echo ($_GET['szamlatipus'] ?? '') === 'hitel' ? 'checked' : ''; ?>> Hitel<br>
    <input type="checkbox" name="feltetel" value="" <?php echo isset($_GET['feltetel']) ? 'checked' : ''; ?>> Elfogadom
    a feltételeket<br>
    <input type="color" name="szin" value="<?php echo isset($_COOKIE['szin']) ? $_COOKIE['szin'] : "white"; ?>"> Elfogadom a
    feltételeket<br>
    <input type="submit" name="elkuld">
</form>