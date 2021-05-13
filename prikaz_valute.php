<?php
include_once("baza.php");
include_once("zaglavlje.php");
$veza=spojiSeNaBazu();
$valuta = $_GET["id"];
$upit = "SELECT * FROM valuta WHERE valuta_id = $valuta";
$rezultat=izvrsiUpit($veza,$upit);
$red=mysqli_fetch_array($rezultat);

?>

<!DOCTYPE html>
<html>
<head>
<title>Prikaz informacija o valuti</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Slika</th>
				<th>Naziv</th>
				<th>Tečaj</th>
				<th>Himna</th>
			</tr>
		</thead>
		<tbody>
			<tr>
	
<?php
if(isset($rezultat)){
		echo "<td> <img src=\"" . $red[4] . "\" </td>";
		echo "<td>" . $red[2] . "</td>"; 
		echo "<td>" . $red[3] . "</td>"; 
		echo "<td> <audio controls src=\"" . $red[5] . "\" </td>";
		?> </div>
		<?php
	
}

?>
