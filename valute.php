<?php
include_once("baza.php");
include_once("zaglavlje.php");
$veza=spojiSeNaBazu();
$upit="SELECT * FROM valuta";
$rezultat=izvrsiUpit($veza,$upit);



?>
<!DOCTYPE html>
<html>
<head>
<title>Valute</title>

</head>
<body>
<?php
	while(list($id,$mod,$naziv,$tecaj,$slika,$zvuk,$od,$do,$datum)=mysqli_fetch_array($rezultat)){
		echo "<a href='prikaz_valute.php?id=" . $id . "'><img src=\"" . $slika . "\" width=150 height=90 style='padding: 50px;'></a>";
}

?>

</body>
</html>
