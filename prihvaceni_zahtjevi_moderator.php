<?php
include_once("baza.php");
include_once("zaglavlje.php");
if(!isset($_SESSION['aktivni_korisnik_tip'])||$_SESSION['aktivni_korisnik_tip']==1) header("Location:index.php");
if($_SESSION['aktivni_korisnik_tip']==2) header("Location:index.php");
$bp=spojiSeNaBazu();
$moderator=$_GET['moderator'];

function PrikaziZahtjeve(){
	if (isset($_GET['moderator'])) {
		$bp=spojiSeNaBazu();
		$moderator=$_GET['moderator'];
		$upit="SELECT v.naziv, SUM(z.iznos) as ukupno_prodani_iznos FROM valuta v, zahtjev z WHERE v.valuta_id=z.prodajem_valuta_id AND z.prihvacen=1 AND moderator_id='$moderator' GROUP BY v.valuta_id ORDER BY ukupno_prodani_iznos DESC";
		$rs=izvrsiUpit($bp,$upit);

		while($rezultat=mysqli_fetch_array($rs)){
			echo "<tr><td>".$rezultat[0]."</td>";
			echo "<td>".$rezultat[1]."</td></tr>";
		}
	}	
}


?>


<!DOCTYPE html>
<html>
	<body>
		<table>
			<caption>
			FILTRIRANJE PREMA MODERATORU ID <?php echo $moderator ?>
			</caption>
			<thead>
				<tr>
					<th>Naziv valute</th>
					<th>Ukupan iznos prodane valute</th>
				</tr>
			</thead>
			<tbody>
				
					<?php PrikaziZahtjeve(); ?>
				
			</tbody>
		</table>
	<body>
</html>