<?php
include_once("baza.php");
include_once("zaglavlje.php");
if(!isset($_SESSION['aktivni_korisnik_tip'])||$_SESSION['aktivni_korisnik_tip']==1) header("Location:index.php");
if($_SESSION['aktivni_korisnik_tip']==2) header("Location:index.php");
$bp=spojiSeNaBazu();


function PrikazZahtjeva(){
if (isset($_GET['id'])) {

	$bp=spojiSeNaBazu();
	$idvalute=$_GET['id'];

	$upit1="SELECT v.moderator_id, v.naziv, SUM(z.iznos) as ukupno_prodani_iznos FROM valuta v, zahtjev z WHERE z.prodajem_valuta_id='$idvalute' AND v.valuta_id='$idvalute' AND z.prihvacen=1";
	$rs=izvrsiUpit($bp,$upit1);
	$dohvati=mysqli_fetch_array($rs);
	$moderator=$dohvati['moderator_id'];
	if($dohvati['ukupno_prodani_iznos'] == 0){ echo "<td>".$idvalute."</td>
													<td>".$dohvati['naziv']."</td>";
													echo '<td><a class="link" href="prihvaceni_zahtjevi_moderator.php?moderator='.$moderator.'"';
													echo '>'.$moderator.'</a></td>';
													echo"<td><p class='greska'>Ne postoji niti jedan prihvaceni zahtjev za ovu valutu</p></td>";}
	else{ echo"
			<td>".$idvalute."</td>
			<td>".$dohvati['naziv']."</td>";
			echo '<td><a class="link" href="prihvaceni_zahtjevi_moderator.php?moderator='.$moderator.'"';
			echo '>'.$moderator.'</a></td>';
			echo "<td>".$dohvati['ukupno_prodani_iznos']."</td>";
		}
	}
}

?>



<!DOCTYPE html>
<html>
	<body>
		<table>
			<caption>
			PRIHVACENI ZAHTJEVI
			<p class="greska">*Za filtriranje zahtjeva po moderatoru kliknite na id moderatora</p>
			</caption>
			<thead>
				<tr>
					<th>Valuta id</th>
					<th>Naziv</th>
					<th>Moderator id</th>
					<th>Ukupan iznos prodane valute</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<?php PrikazZahtjeva(); ?>
				</tr>
			</tbody>
		</table>
		<a class="link" href="prihvaceni_zahtjevi_vrijeme.php">Filtriraj prema vremenskom razdoblju</a>
	<body>
</html>