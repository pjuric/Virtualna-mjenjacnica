
<?php
session_start();
include_once 'baza.php';
include_once 'zaglavlje.php';
$bp=spojiSeNaBazu();

if(!isset($_SESSION['aktivni_korisnik_tip'])) header("Location:index.php");

if(isset($_POST['spremi'])){
    $bp=spojiSeNaBazu();
    $prodajna_valuta = $_POST['prodajna_valuta'];
    $kupovna_valuta = $_POST['kupovna_valuta'];
    $iznos = $_POST['iznos'];
    $datum_i_vrijeme = date("Y-m-d H:i:s");
    $sql = "SELECT * FROM sredstva WHERE korisnik_id={$_SESSION['aktivni_korisnik_id']} AND valuta_id={$prodajna_valuta}";
    $rs = izvrsiUpit($bp,$sql);
    $sredstva = mysqli_fetch_array($rs);

    $greska = "";
    if ($iznos > $sredstva['iznos']) {
        $greska = "<p class='greska'>Nemate dovoljno sredstava</p>";
        echo $greska;
        } 
    else {
          $upit = "INSERT INTO zahtjev(korisnik_id, iznos, prodajem_valuta_id, kupujem_valuta_id, datum_vrijeme_kreiranja, prihvacen) VALUES ({$_SESSION['aktivni_korisnik_id']}, '{$iznos}', {$prodajna_valuta}, {$kupovna_valuta}, '{$datum_i_vrijeme}', '2')";
          izvrsiUpit($bp,$upit);
          header("Location: zahtjevi.php");
         } 
}


function prikazValute() {
    $bp=spojiSeNaBazu();
    $sql = "SELECT * FROM valuta";
    $rs = izvrsiUpit($bp,$sql);
    while ($valuta = mysqli_fetch_array($rs)) {
        echo "<option value='{$valuta['valuta_id']}'>{$valuta['naziv']}</option>";
    }
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dodavanje zahtjeva</title>
</head>
<body>
    <form method="post" action="zahtjev.php">
   
    <table>
        <caption>Dodavanje novog zahtjeva</caption>
        <thead> 
            <tr>
		        <th>Prodajem valutu</th>
		        <th>Kupujem valutu</th>
		        <th>Iznos</th>
		        <th></th>
             </tr>
        </thead>
        <tbody>
            <tr>
                <td><select name="prodajna_valuta">
                    <?php prikazValute(); ?>
                </select></td>
                <td><select name="kupovna_valuta">
                    <?php prikazValute(); ?>
                </select></td>
                <td><input type="number" name="iznos" min="0" required></td>
                <td><input type="submit" name="spremi" value="Spremi zahtjev"></td>
            </tr>
        </tbody>
    </table>
    </form>
</body>
</html>
