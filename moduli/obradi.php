<?php 

include 'konekcija.php';

$ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
$prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
$telefon = filter_input(INPUT_POST, 'tel', FILTER_SANITIZE_NUMBER_INT);

$komentar = filter_input(INPUT_POST, 'opis', FILTER_SANITIZE_STRING);


try{
	if($_POST){
	$upit = $konekcija->prepare("INSERT INTO user (ime, prezime, telefon, obrada) VALUES (:ime, :prezime, :telefon, :obrada)");
	
	$upit->bindParam(':ime', $ime, PDO::PARAM_STR);
	$upit->bindParam(':prezime', $prezime, PDO::PARAM_STR);
	$upit->bindParam(':telefon', $telefon, PDO::PARAM_INT);
	$upit->bindParam(':obrada', $komentar, PDO::PARAM_STR);
	
	
	$upit->execute();
	
	$konekcija = null;
	echo sprintf(
		'<div id="izvestaj">
		<h1>Obradjivanje slika</h1>
		<h3>Hvala na ukazanom poverenju.</h3>
		<div>Uneti podaci:</div>
		<ul>
			<li>Ime: %1$s</li>
			<li>Prezime: %2$s</li>
			<li>Telefon: %3$s</li>
			<li>Zahtev: %4$s</li>
		</ul>',
			$_POST['ime'] ?? '-',
			$_POST['prezime'] ?? '-',
			$_POST['tel'] ?? '-',
			$_POST['opis'] ?? '-'
		);
	 echo 
		'<fieldset>' ,
			'<b>Bicete uskoro kontaktirani od strane naseg osoblja.</b>',
		'</fieldset>';
	$target_dir = "slike/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	
	if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "Fajlovi: " .basename($_FILES["fileToUpload"]["name"]) . "  su aploudovani.<br>";
	} else {
		echo "Dogodila se greška tokom upload-ovanja vaših slika. Molimo vas pokušajte kasnije.</div>";
	}
	} #DODATI BROJAC SLIKA 
}

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
	
		<h1>Obradjivanje slika</h1>
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
			
			<div id="obrada">
				<label>Izaberite sliku/e:</label>
				<input class="contact-form-texxt" type="file" name="fileToUpload" id="fileToUpload"  multiple>
			</div>
			<label>Zahtev:</label>
			<textarea class="contact-form-texxt" name="opis" rows="8" cols="21" class="" placeholder="Opisite ovde..." required></textarea><br>
			
			<button class="dugme" type="submit" onclick="prijava();">Pošalji</button>
			<button class="dugme" type="reset" all>Poništi</button>
	</form>
	</div>
	</body>
</html>