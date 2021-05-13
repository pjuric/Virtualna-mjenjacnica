<?php
include_once("baza.php");
include_once("zaglavlje.php");
if(!isset($_SESSION['aktivni_korisnik_tip'])||$_SESSION['aktivni_korisnik_tip']==1) header("Location:index.php");
if($_SESSION['aktivni_korisnik_tip']==2) header("Location:index.php");
$bp=spojiSeNaBazu();

function PrikaziZahtjev(){
	if(isset($_POST['submit'])){
		$bp=spojiSeNaBazu();
		$od=date(("Y.m.d. H-i-s"), strtotime($_POST['od']));
		$do=date(("Y.m.d. H-i-s"), strtotime($_POST['do']));
		$upit="SELECT v.naziv, SUM(z.iznos) as ukupno_prodani_iznos	
				FROM valuta v, zahtjev z 
				WHERE v.valuta_id=z.prodajem_valuta_id AND z.prihvacen=1 AND datum_vrijeme_kreiranja 
				BETWEEN '$od' AND '$do' GROUP BY v.valuta_id ORDER BY ukupno_prodani_iznos DESC";
		$rs=izvrsiUpit($bp,$upit);
		while($rezultat=mysqli_fetch_array($rs)){
			echo "<tr><td>".$rezultat['naziv']."</td>";
			echo "<td>".$rezultat['ukupno_prodani_iznos']."</td></tr>";
		}
	}
}

?>


<!DOCTYPE html>
<html>
	<body>
	<form method="POST" action="prihvaceni_zahtjevi_vrijeme.php">
		<table>
			<caption>
			FILTRIRANJE PREMA VREMENSKOM RAZDOBLJU
			<p class="greska">Datum i vrijeme unosite u hrvatskom formatu (dd.mm.gggg. hh:mm:ss)</p>
			</caption>
			<thead>
				<tr><th>Od</th>
				<th>Do</th></tr>
			</thead>
			<tbody>
				<tr><td><input type="datetime" name="od" id="od" required placeholder="dd.mm.gggg. hh:mm:ss"></td>
				<td><input type="datetime" name="do" id="do" required placeholder="dd.mm.gggg. hh:mm:ss" ></td>
				<tr><td><input type="submit" name="submit" id="submit"><td></tr>
			</tbody>
		</table>
		<table>
			
			<thead>
				<tr>
					<th>Naziv valute</th>
					<th>Ukupan iznos prodane valute</th>
				</tr>
			</thead>
			<tbody>
					<?php PrikaziZahtjev(); ?>
				
			</tbody>
		</table>
	</form>
	<body>
</html>