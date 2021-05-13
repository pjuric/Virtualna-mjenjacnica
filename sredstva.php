<?php
include_once 'baza.php';
include_once 'zaglavlje.php';
if(!isset($_SESSION['aktivni_korisnik_tip'])) header("Location:index.php");

$bp = spojiSeNaBazu();
$sql = "SELECT * FROM sredstva WHERE korisnik_id='{$aktivni_korisnik_id}'";
$rs = izvrsiUpit($bp,$sql);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sredstva</title>
</head>
<body>
<section>
    <table>
        <caption>Moja sredstva</caption>
        <thead>
            <th>Valuta</th>
            <th>Iznos</th>
            <th></th>
        </thead>
        <tbody>
            <tr>
            <?php 
                if (mysqli_num_rows($rs)==0){
                echo "<p class='greska'>Nema raspolozivih sredstava</p>";
                }
                else{
                    while ($sredstva = mysqli_fetch_array($rs)) {
                    $bp = spojiSeNaBazu();
                    $upit = "SELECT * FROM valuta WHERE valuta_id={$sredstva['valuta_id']}";
                    $rezultat = izvrsiUpit($bp,$upit);
                    $valuta = mysqli_fetch_array($rezultat);
                    echo "<tr>
                        <td>{$valuta['naziv']}</td>
                        <td>{$sredstva['iznos']}</td>
                        <td><a class='link' href='uredi_sredstva.php?sredstva_id={$sredstva['sredstva_id']}'>Uredi sredstva</a></td>";           
                    } 
                }
                echo "<a class='link' href='uredi_sredstva.php'>Dodaj sredstva</a>"
                
            ?>
            </tr>
        </tbody>
    </table>
</section>
</body>
</html>
