<?php
include_once("baza.php");
include_once("zaglavlje.php");
if(!isset($_SESSION['aktivni_korisnik_tip'])) header("Location:index.php");

$veza=spojiSeNaBazu();
$upit="SELECT * FROM zahtjev WHERE korisnik_id='{$aktivni_korisnik_id}'";
$rezultat=izvrsiUpit($veza,$upit);
$bp=spojiSeNaBazu();
?>
<!DOCTYPE html>
<html>
<body>
	<table>
		<caption>Moji Zahtjevi</caption>
			<th>Prodajna valuta</th>
			<th>Iznos</th>
			<th>Kupovna valuta</th>
			<th>Datum i vrijeme kreiranja</th>
			<th>Status</th>
			<th></th>
		</tr></thead>
	<tbody>
	<?php
	if(isset($rezultat)){
		while($red=mysqli_fetch_array($rezultat)){
			$prodajem_valutu=$red[3];
			$upit2="SELECT * FROM valuta WHERE valuta_id = '{$prodajem_valutu}'";
			$rezultat2=izvrsiUpit($veza,$upit2);
			$preuzmi=mysqli_fetch_array($rezultat2);
			$preuzmi2=$preuzmi[2];

			$kupujem_valutu=$red[4];
			$upitk="SELECT * FROM valuta WHERE valuta_id = '{$kupujem_valutu}'";
			$rezultatk=izvrsiUpit($veza,$upitk);
			$preuzmik=mysqli_fetch_array($rezultatk);
			$preuzmik2=$preuzmik[2];
			
			$vrijeme=strtotime($red[5]);
			$nase=date("d.m.Y H:i:s", $vrijeme);
			echo "<tr>";
			echo "<td>{$preuzmi2}</td>";
			echo "<td>{$red[2]}</td>";
			echo "<td>{$preuzmik2}</td>";
			echo "<td>{$nase}</td>";
			echo "<td>";
			if($red[6]==0) {
				echo "odbijen</td>";
			}
			elseif($red[6]==1){
				echo "prihvacen</td>";
			}
			else{
				echo "na cekanju</td>";
			}
		}
	}
	echo '<tr><td><a class="link" href="zahtjev.php"> Novi zahtjev </a></td></tr>';
	?>
	</tbody>

</body>
</html>
