<?php
	include_once("zaglavlje.php");
?>

<article>
	<div id="opis">
		<h2>Virtualna mjenačnica</h2>
		<p><b>Aplikacija koja simulira virtualnu mjenjačnicu, postoji mogućnost dodavanja i uređivanja korisnika, valuta i korisničkih zahtjeva. Sustav omogućuje virtualno mijenjanje novca i ima mogućnost prijave i odjave korisnika sa sustava. </b></p>
	</div>
	<br/>
	<table>
		<caption>Korisnici sustava</caption>
		<thead>
			<tr>
				<th class="lijevi">Popis uloga</th>
				<th>Opis uloga</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Administrator (tip 0)</td>
				<td>Unosi, ažurira i pregledava korisnike sustava te definira i ažurira njihove tipove. Unosi, pregledava i ažurira valute.</td>
			</tr>
			<tr>
				<td>Moderator (tip 1)</td>
				<td>Može vidjeti zahtjeve svih korisnika koji traže prodaju valute. Moderator može prihvatiti ili odbiti zahtjev.</td>
			</tr>
			<tr>
				<td>Registrirani korisnik (tip 2)</td>
				<td>Može unijeti, pregledavati i ažurirati iznose kojima raspolaže i u kojoj valuti. Može poslati zahtjev za prodajom iznosa neke valute kojom raspolaže.</td>
			</tr>
			<tr>
				<td>Anonimni (neregistirirani) korisnik (tip 3)</td>
				<td>Može vidjeti sve valute u obliku galerije slika, a odabirom valute dobiva informaciju o tečaju te audio zapis s himnom države ako je on postavljen.</td>
			</tr>
		</tbody>
	</table>
	<br/>
	<table>
		<caption>Datoteke sustava</caption>
		<thead>
			<tr>
				<th class="lijevi">Popis datoteka</th>
				<th>Opis datoteka</th>
				<th>Tipovi korisnika koji mogu koristiti datoteku</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>o_autoru.html</td>
				<td>Osobni podaci</td>
				<td>0,1,2,3</td>
			</tr>
			<tr>
				<td>pjuric.css</td>
				<td>CSS upute</td>
				<td></td>
			</tr>
			<tr>
				<td>baza.php</td>
				<td>Skripta za rad s bazom podataka</td>
				<td></td>
			</tr>
			<tr>
				<td>zaglavlje.php</td>
				<td>Zaglavlje, sve ostale datoteke je uključuju, sadrži meni i uključuje css</td>
				<td>0,1,2,3</td>
			</tr>
			<tr>
				<td>index.php</td>
				<td>Početna stranica i kratak opis aplikacije</td>
				<td>0,1,2,3</td>
			</tr>
			<tr>
				<td>korisnici.php</td>
				<td>Tablica koja izlistava korisnike, postoji mogućnost dodavanja i uređivanja korisnika</td>
				<td>0</td>
			</tr>
			<tr>
				<td>korisnik.php</td>
				<td>Obrazac za unos novog ili uređivanje postojećeg korisnika.</td>
				<td>0,1,2</td>
			</tr>
			<tr>
				<td>prihvaceni_zahtjevi.php</td>
				<td>Izlistava ukupan iznos prodanih valuta na temelju prihvaćenih zahtjeva</td>
				<td>0</td>
			</tr>
			<tr>
				<td>prihvaceni_zahtjevi_moderator.php</td>
				<td>Filtrira sve zahtjeve prema moderatoru. Pristupa se klikom na id moderatora (poveznica) na stranici "prihvaceni_zahtjevi.php"</td>
				<td>0</td>
			</tr>
			<tr>
				<td>prihvaceni_zahtjevi_vrijeme.php</td>
				<td>Filtrira sve zahtjeve prema unesenom razdoblju. Pristupa se preko poveznice na stranici "prihvaceni_zahtjevi.php"</td>
				<td>0</td>
			</tr>
			<tr>
				<td>prihvati_zahtjev.php</td>
				<td>Filtrira sve zahtjeve moderatoru koji je odgovoran za pojedinu valutu. Administratoru se filtriraju svi zahtjevi.</td>
				<td>0,1</td>
			</tr>
			<tr>
				<td>prikaz_valute.php</td>
				<td>Prikazuje informacije o valuti (tecaj, himna...)</td>
				<td>0,1,2,3</td>
			</tr>
			<tr>
				<td>sredstva.php</td>
				<td>Prikazuje raspoloziva sredstva prijavljenog korsinika</td>
				<td>0,1,2</td>
			</tr>
			<tr>
				<td>uredi_sredstva.php</td>
				<td>Mogucnost dodavanja i azuriranja sredstava na racunu</td>
				<td>0,1,2</td>
			</tr>
			<tr>
				<td>uredi_tecaj.php</td>
				<td>Omogucuje moderatoru azuriranje tecaja jednom dnevno na valuti/valute za koju je postavljen</td>
				<td>1</td>
			</tr>
			<tr>
				<td>uredi_valutu.php</td>
				<td>Prikaz valuta s poveznicom na "uredi_tecaj.php" za moderatora te poveznicom na valuta.php i prihvaceni_zahtjevi.php za administratora</td>
				<td>0,1</td>
			</tr>
			<tr>
				<td>valuta.php</td>
				<td>Omogucuje administratoru uredivanje i azuriranje podataka o valuti, te dodavanje nove valute</td>
				<td>0</td>
			</tr>
			<tr>
				<td>valute.php</td>
				<td>Prkaz valuta u obliku galerije slika gdje je svaka slika poveznica na "prikaz_valute.php"</td>
				<td>0,1,2,3</td>
			</tr>
			<tr>
				<td>zahtjev.php</td>
				<td>Omogucuje aktivnom korisniku dodavanje novog zahtjeva</td>
				<td>0,1,2</td>
			</tr>
			<tr>
				<td>zahtjevi.php</td>
				<td>Prikazuje sve zahtjeve aktivnog korisnika i sadrži poveznicu na "zahtjev.php"</td>
				<td>0,1,2</td>
			</tr>
		</tbody>
	</table>
	<table>
		<caption>Korišteni (internetski) izvori</caption>
		<tbody>
		 
			<tr><td>Materijali s moodle-a i ogledna aplikacija<td></tr>
			<tr><td>Stack overflow (https://stackoverflow.com/)<td></tr>
			<tr><td>w3schools (https://www.w3schools.com/)<td></tr>
			<tr><td>developer.moozila (https://developer.mozilla.org/en-US/)<td></tr>
			<tr><td>sitepoint (https://www.sitepoint.com/)<td></tr>
			<tr><td>codepen (https://codepen.io/)<td></tr>

		 
		</tbody>
	</table>
</article>

