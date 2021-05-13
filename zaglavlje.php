<?php
	include_once("baza.php");
	if(session_id()=="")session_start();

	$trenutna=basename($_SERVER["PHP_SELF"]);
	$putanja=$_SERVER['REQUEST_URI'];
	$aktivni_korisnik=0;
	$aktivni_korisnik_tip=-1;
	$vel_str=5;

	if(isset($_SESSION['aktivni_korisnik'])){
		$aktivni_korisnik=$_SESSION['aktivni_korisnik'];
		$aktivni_korisnik_ime=$_SESSION['aktivni_korisnik_ime'];
		$aktivni_korisnik_tip=$_SESSION['aktivni_korisnik_tip'];
		$aktivni_korisnik_id=$_SESSION["aktivni_korisnik_id"];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Virtualna mjenjačnica</title>
		<meta name="autor" content="Jurić Petar"/>
		<meta charset="utf-8"/>
		<link href="pjuric.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body onload="forma();">
		<header>
			<span>
				<strong>Virtualna mjenačnica</strong>
				<br/>
				<?php
					echo "<strong>Trenutna lokacija: </strong>".$trenutna."<br/>";
					if($aktivni_korisnik===0){
						echo "<span><strong>Status: </strong>Neprijavljeni korisnik</span><br/>";
						echo "<a class='link' href='login.php'>prijava</a><br>";
						echo "<a class='link' href='o_autoru.html'>o autoru</a>";
					}
					else{
						echo "<span><strong>Korisnik: </strong>$aktivni_korisnik_ime</span><br/>";
						echo "<a class='link' href='login.php?logout=1'>odjava</a><br>";
						echo "<a class='link' href='o_autoru.html'>o autoru</a>";
					}
				?>
			</span>
		</header>
		<nav id="navigacija" class="menu">
			<?php
				if ($aktivni_korisnik_tip == 2) {
						echo '<a href="index.php"';
						if($trenutna=="index.php")echo ' class="aktivna"';
						echo ">POČETNA</a>";
						echo '<a href="valute.php"';
						if($trenutna=="valute.php")echo ' class="aktivna"';
						echo ">VALUTE</a>";
						echo '<a href="sredstva.php"';
						if($trenutna=="sredstva.php")echo ' class="aktivna"';
						echo ">MOJA SREDSTVA</a>";
						echo '<a href="zahtjevi.php"';
						if($trenutna=="zahtjevi.php")echo ' class="aktivna"';
						echo ">MOJI ZAHTJEVI</a>";
						if(isset($_SESSION["aktivni_korisnik_id"])) echo '<a href="korisnik.php?korisnik='.$_SESSION["aktivni_korisnik_id"].'"';
						if($trenutna=="korisnik.php") echo 'class="aktivna"';
						echo '>UREDI MOJE PODATKE</a>';
				} else if ($aktivni_korisnik_tip == 0) {
						echo '<a href="index.php"';
						if($trenutna=="index.php")echo ' class="aktivna"';
						echo ">POČETNA</a>";
						echo '<a href="valute.php"';
						if($trenutna=="valute.php")echo ' class="aktivna"';
						echo ">VALUTE</a>";	
						echo '<a href="sredstva.php"';
						if($trenutna=="sredstva.php")echo ' class="aktivna"';
						echo ">MOJA SREDSTVA</a>";
						echo '<a href="zahtjevi.php"';
						if($trenutna=="zahtjevi.php")echo ' class="aktivna"';
						echo ">MOJI ZAHTJEVI</a>";
						echo '<a href="korisnici.php"';
						if($trenutna=="korisnici.php")echo ' class="aktivna"';
						echo ">KORISNICI</a>";							
						echo '<a href="uredi_valutu.php"';
						if($trenutna=="uredi_valutu.php")echo ' class="aktivna"';
						echo ">UREĐIVANJE VALUTA</a>";
						echo '<a href="prihvati_zahtjev.php"';
						if($trenutna=="prihvati_zahtjev.php")echo ' class="aktivna"';
						echo ">KORISNICKI ZAHTJEVI</a>";
				} else if ($aktivni_korisnik_tip == 1) {
						echo '<a href="index.php"';
						if($trenutna=="index.php")echo ' class="aktivna"';
						echo ">POČETNA</a>";
						echo '<a href="valute.php"';
						if($trenutna=="valute.php")echo ' class="aktivna"';
						echo ">VALUTE</a>";		
						echo '<a href="sredstva.php"';
						if($trenutna=="sredstva.php")echo ' class="aktivna"';
						echo ">MOJA SREDSTVA</a>";
						echo '<a href="zahtjevi.php"';
						if($trenutna=="zahtjevi.php")echo ' class="aktivna"';
						echo ">MOJI ZAHTJEVI</a>";
						echo '<a href="prihvati_zahtjev.php"';
						if($trenutna=="prihvati_zahtjev.php")echo ' class="aktivna"';
						echo ">KORISNICKI ZAHTJEVI</a>";
						echo '<a href="uredi_valutu.php"';
						if($trenutna=="uredi_valutu.php")echo ' class="aktivna"';
						echo ">UREĐIVANJE VALUTA</a>";
						if(isset($_SESSION["aktivni_korisnik_id"]))echo '<a href="korisnik.php?korisnik='.$_SESSION["aktivni_korisnik_id"].'"';
						if($trenutna=="korisnik.php")echo ' class="aktivna"';
						echo ">UREDI MOJE PODATKE</a>";
						
				} else {
                        echo '<a href="index.php"';
						if($trenutna=="index.php")echo ' class="aktivna"';
						echo ">POČETNA</a>";
						echo '<a href="valute.php"';
						if($trenutna=="valute.php")echo ' class="aktivna"';
						echo ">VALUTE</a>";
						
				}
			?>
		</nav>
		