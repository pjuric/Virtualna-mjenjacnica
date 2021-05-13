<?php
	include("zaglavlje.php");
	$bp=spojiSeNaBazu();

	if(!isset($_SESSION['aktivni_korisnik_tip'])||$_SESSION['aktivni_korisnik_tip']==2) header("Location:index.php");

if ($_SERVER['REQUEST_METHOD'] === "POST") {
			$bp=spojiSeNaBazu();
			$id=$_GET['tecaj'];
			$danas=date("Y-m-d");
			$tecaj=$_POST['tecaj'];
			$sql="UPDATE valuta SET tecaj = '$tecaj', datum_azuriranja ='$danas'  WHERE valuta_id='$id'"; 
			izvrsiUpit($bp,$sql);
			header("Location:uredi_valutu.php");
		}
	

if(isset($_GET['tecaj'])){
		$id=$_GET['tecaj'];
		$sql="SELECT * FROM valuta WHERE valuta_id='$id'";
		$rs=izvrsiUpit($bp,$sql);
		list($id,$moderator,$naziv,$tecaj,$slika,$zvuk,$od,$do,$datum)=mysqli_fetch_array($rs);
}
?>
<!DOCTYPE html>
<html>
<body>
<form method="POST" action="<?php if(isset($_GET['tecaj']))echo "uredi_tecaj.php?tecaj=$id";?>">
		<table>
				<caption>UREDI TECAJ <br><p class="greska">Napomena: tecaj mozete azurirati samo jednom dnevno</p></caption>
				<thead>
					<tr>
						<td>Id valute</td>
						<td>Naziv</td>
						<td>Tecaj</td>
						<td>Datum posljednjeg azuriranja</td>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $id; ?></td>
						<td><?php echo $naziv; ?></td>
						<td><?php if(date("Y-m-d")==$datum) echo "<input name='tecaj' id='tecaj' type='number' value='$tecaj' readonly>";
									else echo "<input name='tecaj' id='tecaj' type='number' value='$tecaj' step='0.000001'>";?></td>
						<td><?php echo date("d.m.Y.", strtotime($datum)) ;?></td>
						<td><input type="submit" name="submit" id="submit" value="Spremi"></td>
					</tr>
				</tbody>
	</table>
</form>
</body>
</html>