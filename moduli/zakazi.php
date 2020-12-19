<?php 

include 'konekcija.php';

$ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
$prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
$telefon = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);

$tip_proslave = $_POST['tip'] ?? '';

$lokacija = $_POST['location'] ?? '';
$datum = $_POST['date'] ?? '';
$vreme = $_POST['time'] ?? '';

$komentar = filter_input(INPUT_POST, 'opis', FILTER_SANITIZE_STRING);


try{
	if($_POST){
	/* Pripremi templejt upita */
	$upit = $konekcija->prepare("INSERT INTO user (ime, prezime, telefon, tip_proslave, lokacija, datum, vreme, zahtev) VALUES (:ime, :prezime, :telefon, :tip_proslave, :lokacija, :datum, :vreme, :zahtev )");
	/* Veži promenljive kao parametre pripremljenog upita i deklariši tip podataka */
	$upit->bindParam(':ime', $ime, PDO::PARAM_STR);
	$upit->bindParam(':prezime', $prezime, PDO::PARAM_STR);
	$upit->bindParam(':telefon', $telefon, PDO::PARAM_STR);
	$upit->bindParam(':tip_proslave', $tip_proslave, PDO::PARAM_STR);
	$upit->bindParam(':lokacija', $lokacija, PDO::PARAM_STR);
	$upit->bindParam(':datum', $datum, PDO::PARAM_STR);
	$upit->bindParam(':vreme', $vreme, PDO::PARAM_STR);
	$upit->bindParam(':zahtev', $komentar, PDO::PARAM_STR);
	
	
	$upit->execute();
	
	$konekcija = null;
	
	echo sprintf(
		'<div id="izvestaj">
		<h1>Zakazivanje</h1>
		<h3>Hvala vam na ukazanom poverenju.</h3>
		<div>Uneti podaci:</div>
		<ul>
			<li>Ime: %1$s</li>
			<li>Prezime: %2$s</li>
			<li>Telefon: %3$s</li>
			<li>Tip proslave: %4$s</li>
			<li>Lokacija: %5$s</li>
			<li>Datum: %6$s</li>
			<li>Vreme: %7$s</li>
			<li>Zahtev: %8$s</li>
		</ul>',
			$_POST['ime'] ?? '-',
			$_POST['prezime'] ?? '-',
			$_POST['tel'] ?? '-',
			$_POST['tip'] ?? '-',
			$_POST['location'] ?? '-',
			$_POST['date'] ?? '-',
			$_POST['time'] ?? '-',
			$_POST['opis'] ?? '-'
		);
	 echo 
		'<fieldset>' ,
			'<b>Bicete uskoro kontaktirani od strane naseg osoblja.</b>',
		'</fieldset></div>';
	}
}
/* U slučaju da je napravljen izuzetak (došlo je do greške), ispiši odgovarajuću poruku */
catch(PDOException $e) {
	echo "<p>". "Greška pri upisu podataka u bazu, molimo Vas pokušajte kasnije..<br>"  . $e->getMessage() . " </p>";
}
?>

<!doctype html>
	<head>
		<link rel="stylesheet" href="styles/zakazi.css" type="text/css"/>
		<meta charset="utf8">
	<style>
		body {
			background-image: url("styles/slider2.jpg");
			background-size: cover;
			background-attachment: fixed;
		}
		p{color: white;font-size: 20pt; margin: 10% 25% 0 25%;}
		#izvestaj {
				color: #fff;
				margin: 3% 25% 0 25%;
			}
		label, button { display: block; }
		.dugme {display : inline;}
	</style>
	</head>
	<script>
		//da bi smo bili malo sigurniji kod unosenja podataka u formu
	// radimo proveru sa regularnim izrazima
		function prijava(){
		var ime = document.getElementById('name');
		var imeL = document.getElementById('Ime');
		var regIme = /^[a-zA-Z]{3,}$/;
			
		if (!regIme.test(ime.value)){
			imeL.style.color ="red";
			imeL.innerHTML = "&#10060";
		} else{
			imeL.style.color ="green";
			imeL.innerHTML = "&#10004";
			console.log(ime.value);
		}
		
		var prez = document.getElementById('surname');
		var prezL = document.getElementById('Prezime');
		var regPrez = /^[a-zA-Z]{3,}$/;
			
		if (!regPrez.test(prez.value)){
			prezL.style.color ="red";
			prezL.innerHTML = "&#10060";
		} else{
			prezL.style.color ="green";
			prezL.innerHTML ="&#10004";
			console.log(prez.value);
		}
		var tel = document.getElementById('phone');
		var telL = document.getElementById('Tel');
		var regtel = /^06[0-9]{7,8}$/;
		
		if(!regtel.test(tel.value)){
			telL.style.color = "red";
			telL.innerHTML = "&#10060";
		} else{
			telL.style.color = "green";
			telL.innerHTML = "&#10004";
			console.log(tel.value);
		}
}
	</script>
	<body>
		<div class="modal">
	
		<h1>ZAKAŽITE USLUGU OVDE</h1>
		<div class="border"></div>
		<form class="forma" action="" method="post" enctype="multipart/form-data">
			<label>Ime:</label>
			<input class="contact-form-texxt" type="text" name="ime" id="name" required>
			<span id="Ime"></span>
			
			<label>Prezime:</label>
			<input class="contact-form-texxt" type="text" name="prezime" id="surname" required>
			<span id="Prezime"></span>
			
			<label>Telefon:</label>
			<input class="contact-form-texxt" name="tel" type="tel" id="phone" required>
			<span id="Tel"></span>
			
			<label>Zakažite</label>
			<select class="izbor" name="tip">
				<option value="vencanje" default>Venčanje</option>
				<option value="rodjendan">Rođendan</option>
				<option value="outdoor">Outdoor</option>
				<option value="nightlife">Nightlife</option>
				<option value="sredisliku">Sredi sliku</option>
			</select>
			
			<label>Lokacija:</label>
			<input class="contact-form-texxt" type="text" name="location" >
			
			<label>Odaberite datum:</label>
			<input class="contact-form-texxt" type="date" name="date" >
			
			<label>Odaberite vreme:</label>
			<input class="contact-form-texxt" type="time" name="time">
			
			<label>Komentar(zahtev):</label>
			<textarea class="contact-form-texxt" name="opis" rows="8" cols="21" class="" placeholder="Opisite ovde..." required></textarea><br>
			
			<button class="dugme" type="submit" onclick="prijava();">Pošalji</button>
			<button class="dugme" type="reset" all>Poništi</button>
	</form>
	</div>
	</body>
</html>