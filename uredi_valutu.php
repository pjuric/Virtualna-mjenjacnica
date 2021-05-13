<?php
	include_once("zaglavlje.php");
	$bp=spojiSeNaBazu();
	if(!isset($_SESSION['aktivni_korisnik_tip'])||$_SESSION['aktivni_korisnik_tip']==2) header("Location:index.php");

?>

<?php
if($aktivni_korisnik_tip==0){
	$sql="SELECT * FROM valuta";
}
else{
	$korsinik=$_SESSION['aktivni_korisnik_id'];
	$sql="SELECT * FROM valuta WHERE moderator_id = '$korsinik'";
}
	$rs=izvrsiUpit($bp,$sql);

	echo "<table>";
	echo "<caption>UREĐIVANJE VALUTA</caption>";
	echo "<thead><tr>
		<th>Naziv</th>
		<th>Slika</th>
		<th></th>";
	echo "</tr></thead>";

	echo "<tbody>";
	while(list($id,$mod,$naziv,$tecaj,$slika,$zvuk,$od,$do,$datum)=mysqli_fetch_array($rs)){
		echo "<tr>
			<td>$naziv</td>";
		echo "<td><figure><img src='$slika' width='70' height='100' alt='Slika valute $naziv'/></figure></td>";
		if($aktivni_korisnik_tip==0)echo "<td><a class='link' href='valuta.php?valuta=$id'>UREDI</a></td>";
		else echo  "<td><a class='link' href='uredi_tecaj.php?tecaj=$id'>UREDI TECAJ</a></td>";
		if($aktivni_korisnik_tip==0) echo "<td><a class='link' href='prihvaceni_zahtjevi.php?id=$id'>SUMA ZAHTJEVA</td>";
		echo "</tr>";
	}
	echo '<tr><td>';
	if($aktivni_korisnik_tip==0)echo '<a class="link" href="valuta.php">DODAJ VALUTU</a></td></tr>';
	echo "</tbody>";
	echo "</table>";

?>

<?php
	zatvoriVezuNaBazu($bp);
?>
