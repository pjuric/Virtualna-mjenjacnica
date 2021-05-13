<?php

include_once("baza.php");
include_once("zaglavlje.php");

$bp=spojiSeNaBazu();

if(!isset($_SESSION['aktivni_korisnik_tip'])||$_SESSION['aktivni_korisnik_tip']==2) header("Location:index.php");

if (isset($_GET['prihvati'])) {

	$idZahtjev=$_GET['prihvati'];
	$prihvatiZahtjev="UPDATE zahtjev SET prihvacen = 1 WHERE zahtjev_id = '$idZahtjev'";
	izvrsiUpit($bp,$prihvatiZahtjev);

	if($_SESSION['aktivni_korisnik_tip']==1){
		$gen = "SELECT * FROM valuta, zahtjev WHERE moderator_id = {$_SESSION['aktivni_korisnik_id']}  AND prihvacen = 2 AND zahtjev.prodajem_valuta_id = valuta.valuta_id";
	}
	else if($_SESSION['aktivni_korisnik_tip']==0){
		$gen = "SELECT * FROM valuta, zahtjev WHERE prihvacen = 2 AND zahtjev.prodajem_valuta_id = valuta.valuta_id";
	}

	$preuzmiz=izvrsiUpit($bp,$gen);
	$preuzmizahtjev=mysqli_fetch_array($preuzmiz);
	$prodajemid=$preuzmizahtjev['prodajem_valuta_id'];
	$kupujemid=$preuzmizahtjev['kupujem_valuta_id'];
	$iznos1=$preuzmizahtjev['iznos'];
	$tecajp=$preuzmizahtjev['tecaj'];
	$korisnikid=$preuzmizahtjev['korisnik_id'];
	
	$sred = "SELECT * FROM sredstva WHERE korisnik_id='$korisnikid' AND valuta_id='$prodajemid'";
	$sreta = izvrsiUpit($bp,$sred);
	$sret = mysqli_fetch_array($sreta);
	$prodajemiznos = $sret['iznos'];
	$azurirajprodajemiznos=$prodajemiznos - $iznos1;

	$query="UPDATE sredstva SET iznos='$azurirajprodajemiznos' WHERE korisnik_id='$korisnikid' AND valuta_id='$prodajemid'";
	izvrsiUpit($bp,$query);

	$upit1="SELECT * FROM valuta WHERE valuta_id = '$kupujemid'";
	$resu = izvrsiUpit($bp,$upit1);
	$preuzmiv=mysqli_fetch_array($resu);
	$tecajk=$preuzmiv['tecaj'];
	$iznos2=$iznos1 * $tecajp;
	$iznos3=$iznos2 / $tecajk;

	$upit2 = "SELECT * FROM sredstva WHERE korisnik_id='$korisnikid' AND valuta_id='$kupujemid'";
    $rezultat1 = izvrsiUpit($bp,$upit2);
	

	if(mysqli_num_rows($rezultat1) == 0){
		$sql="INSERT INTO sredstva
				(korisnik_id, valuta_id, iznos)
			  VALUES
				('$korisnikid', '$kupujemid', '$iznos3')";
		izvrsiUpit($bp,$sql);
		}
		
	else{
		$dohvati=mysqli_fetch_array($rezultat1);
		$pr=$dohvati['iznos'];
		$iznos4=$pr+$iznos3;
        $sql = "UPDATE sredstva SET iznos= '$iznos4' WHERE valuta_id='$kupujemid' AND korisnik_id='$korisnikid'";
		izvrsiUpit($bp,$sql);
	}
	
	header("Location:prihvati_zahtjev.php");
}
else{
	if (isset($_GET['odbij'])) {
		$idZahtjev=$_GET['odbij'];
		$sql="UPDATE zahtjev SET prihvacen = 0 WHERE zahtjev_id='$idZahtjev'";
		izvrsiUpit($bp,$sql);
	}
}


function Prikazi(){
$bp=spojiSeNaBazu();
if($_SESSION['aktivni_korisnik_tip']==1){
$opt = "SELECT * FROM valuta, zahtjev WHERE moderator_id = {$_SESSION['aktivni_korisnik_id']}  AND prihvacen = 2 AND zahtjev.prodajem_valuta_id = valuta.valuta_id";
}
else if($_SESSION['aktivni_korisnik_tip']==0){
$opt = "SELECT * FROM valuta, zahtjev WHERE prihvacen = 2 AND zahtjev.prodajem_valuta_id = valuta.valuta_id";
}
$rs = izvrsiUpit($bp,$opt);

	while($preuzmi=mysqli_fetch_array($rs)){
		echo "<tr><td>" . $preuzmi[9] . "</td>";
		echo "<td>" . $preuzmi[10] . "</td>";
		echo "<td>" . $preuzmi[11] . "</td>";
		echo "<td>" . $preuzmi[2] . "</td>";
		echo "<td>" . $preuzmi[13] . "</td>";
		echo "<td>" . date("d.m.Y H:i:s", strtotime($preuzmi[14])) . "</td>";
		echo "<td>" . date("H:i:s", strtotime($preuzmi[6])) . "</td>";
		echo "<td>" . date("H:i:s", strtotime($preuzmi[7])) . "</td>";
		if(date("H:i:s", strtotime($preuzmi[6])) < date("H:i:s") && date("H:i:s") < date("H:i:s", strtotime($preuzmi[7]))){
			echo "<td><a class='link' href='prihvati_zahtjev.php?prihvati={$preuzmi['zahtjev_id']}'>Prihvati</a>";
			echo "<td><a class='link' href='prihvati_zahtjev.php?odbij={$preuzmi['zahtjev_id']}'>Odbij</a></td>";
		}
		else echo "<td></td>";
		}
		
}


?>

<!DOCTYPE html>
<html>
	<body>
		<table>
			<caption>
			PRIHVATI ZAHTJEV <br>
			<p class="greska">Napomena: zahtjeve mozete prihvatiti i odbiti samo u aktivnom vremenu</p>
			<caption>
			<thead>
				<tr>
					<th>Zahtjev id</th>
					<th>Korisnik id</th>
					<th>Iznos</th>
					<th>Prodajna valuta id</th>
					<th>Kupovna valuta id</th>
					<th>Datum i vrijeme kreiranja</th>
					<th>Aktivno od</th>
					<th>Aktivno do</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php Prikazi(); ?>
				</tr>
			</tbody>
		</table>
	<body>
</html>