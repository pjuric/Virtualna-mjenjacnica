<?php
include_once("baza.php");
include_once("zaglavlje.php");
$bp=spojiSeNaBazu();

if (isset($_GET['valuta'])){
    $upit = "SELECT * FROM valuta WHERE valuta_id={$_GET['valuta']}";
    $rezultat = izvrsiUpit($bp,$upit);
    $preuzmi = mysqli_fetch_array($rezultat);
}

function Mod() {
    if (isset($_GET['valuta'])) {
        global $preuzmi;
    }
    $bp=spojiSeNaBazu();
    $upit = "SELECT * FROM korisnik WHERE tip_korisnika_id=1";
    $rezultat = izvrsiUpit($bp,$upit);
    while ($korisnik = mysqli_fetch_array($rezultat)) {
            echo "<option value='{$korisnik['korisnik_id']}'>{$korisnik['korisnicko_ime']}</option>";
        }
    }


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $moderator_id = $_POST['moderator_id'];
    $naziv = $_POST['naziv'];
    $tecaj = $_POST['tecaj'];
    $slika = $_POST['slika'];
    $himna = $_POST['himna'];
    $aktivno_od = date("H:i:s", strtotime($_POST['aktivno_od']));
    $aktivno_do = date("H:i:s", strtotime($_POST['aktivno_do']));
    $datum=date("Y-m-d");


    if ($id == 0) {
        $upit = "INSERT INTO valuta
                    (moderator_id, naziv, tecaj, slika, zvuk, aktivno_od, aktivno_do, datum_azuriranja) 
                 VALUES 
                    ({$moderator_id}, '{$naziv}', '{$tecaj}', '{$slika}', '{$himna}', '{$aktivno_od}', '{$aktivno_do}', '{$datum}')";
    } else {
        $upit = "UPDATE valuta SET 
            moderator_id={$moderator_id}, 
            naziv='{$naziv}', 
            tecaj='{$tecaj}', 
            slika='{$slika}', 
            zvuk='{$himna}', 
            aktivno_od='{$aktivno_od}', 
            aktivno_do='{$aktivno_do}' 
            WHERE valuta_id={$id}";
    }
    izvrsiUpit($bp,$upit);

    header("Location: uredi_valutu.php");
}
?>

<!DOCTYPE html>
<html>
<body>
    <form method="POST" action="valuta.php">
    <table>
        <caption><?php if(isset($_GET['valuta'])) echo "Uredi valutu"; else echo "Dodaj valutu"; ?></caption>
        <tbody>
            <tr><th><input type="hidden" name="id" value="<?php if(isset($_GET['valuta'])) echo $_GET['valuta']; else echo 0; ?>"></th></tr>
            <tr><th>Moderator</th><th><select name="moderator_id"> <?php Mod(); ?></select></th></tr>
            <tr><th>Valuta</th><th><input type="text" name="naziv" required value="<?php if(isset($_GET['valuta'])) echo $preuzmi['naziv']; ?>"></th></tr>
            <tr><th>Tecaj</th><th><input type="number" name="tecaj" min="0" step="0.000001" required value="<?php if(isset($_GET['valuta'])) echo $preuzmi['tecaj']; ?>"></th></tr>
            <tr><th>Slika (URL)</th><th><input type="url" name="slika" required value="<?php if(isset($_GET['valuta'])) echo $preuzmi['slika']; ?>"></th></tr>
            <tr><th>Zvuk / himna (URL)</th><th><input type="url" name="himna" value="<?php if(isset($_GET['valuta'])) echo $preuzmi['zvuk']; ?>"></th></tr>
            <tr><th>Aktivno od</th>><th><input type="text" name="aktivno_od" required value="<?php if(isset($_GET['valuta'])) echo $preuzmi['aktivno_od']; ?>"</th></tr>
            <tr><th>Aktivno do</th><th><input type="text" name="aktivno_do" required value="<?php if(isset($_GET['valuta'])) echo $preuzmi['aktivno_do']; ?>"></th></tr>
            <tr><th><input type="submit" value="Spremi valutu"></th><th></th></tr>
        </tbody>
    </table>
    </form>
</body>
</html>
