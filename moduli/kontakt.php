<?php 

include 'konekcija.php';

$ime = filter_input(INPUT_POST, 'ime', FILTER_SANITIZE_STRING);
$prezime = filter_input(INPUT_POST, 'prezime', FILTER_SANITIZE_STRING);
$mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
$opis = filter_input(INPUT_POST, 'opis', FILTER_SANITIZE_STRING);

try{
	if($_POST){
	/* Pripremi templejt upita */
	$upit = $konekcija->prepare("INSERT INTO kontakt (ime, prezime, email, poruka) VALUES (:ime, :prezime, :email, :poruka)");
	
	$upit->bindParam(':ime', $ime, PDO::PARAM_STR);
	$upit->bindParam(':prezime', $prezime, PDO::PARAM_STR);
	$upit->bindParam(':email', $mail, PDO::PARAM_STR);
	$upit->bindParam(':poruka', $opis, PDO::PARAM_STR);
	
	$upit->execute();
	
	$konekcija = null;
	echo sprintf(
		'<div id="izvestaj">
		<h1>Kontakt</h1>
		<h3>Hvala na interesovanju</h3>
		<div>Uneti podaci:</div>
		<ul>
			<li>Ime: %1$s</li>
			<li>Prezime: %2$s</li>
			<li>Mail: %3$s</li>
			<li>Opis: %4$s</li>
		</ul>',
			$_POST['ime'] ?? '-',
			$_POST['prezime'] ?? '-',
			$_POST['mail'] ?? '-',
			$_POST['opis'] ?? '-'
		);
	 echo 
		'<fieldset>' ,
			'<b>Potrudićemo se da vam što pre odgovorimo.</b>',
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
		<meta charset="utf8">
		<link rel="stylesheet" href="styles/kontakt.css" type="text/css"/>
		<style>
			body {
				background-image: url("styles/slider2.jpg");
				background-size: cover;
				background-attachment: fixed;
			}
			p{color: white;font-size: 20pt; margin: 5% 25% 0 25%;}
			#izvestaj {
				color: #fff;
				margin: 3% 25% 0 25%;
			}
			.contact-section {height: 100%;}
			.contact-section h1{text-align: center;color: #fff;}
			.border {background: #fff;}
			label, button { display: block; color: #fff;font-size:16pt; }
			.dugme {display : inline;}
			.contact-section {
				margin-top: 7%;
}
		</style>
	</head>
	<script>
		function provera(){
		var ime = document.getElementById('name');
		var imeL = document.getElementById('Ime');
		var regIme = /^[A-Z]{1}[a-z]{2,}$/;
			
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
		var regPrez = /^[A-Z]{1}[a-z]{2,}$/;
			
		if (!regPrez.test(prez.value)){
			prezL.style.color ="red";
			prezL.innerHTML = "&#10060";
		} else{
			prezL.style.color ="green";
			prezL.innerHTML ="&#10004";
			console.log(prez.value);
		}
		
		var regMejl = document.getElementById('mail');
		var regMejlL = document.getElementById('Mejl');
		var regMejl2 = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
		
		if(!regMejl2.test(regMejl.value)){
			regMejlL.style.color = "red";
			regMejlL.innerHTML = "&#10060";
		} else {
			regMejlL.style.color = "green";
			regMejlL.innerHTML = "&#10004";
			console.log(regMejl.value);
		}
}
	</script>
	<body>
		<div class="contact-section">
			<h1>Imate pitanja? Pišite ovde!</h1>
			<div class="border"></div> 
		
		<form class="contact-form" action="" method="post" enctype="multipart/form-data">
			<label>Ime:</label>
			<input type="text" name="ime" id="name" class="contact-form-text" required>
			<span id="Ime"></span>
			
			<label>Prezime:</label>
			<input type="text" name="prezime" id="surname" class="contact-form-text" required>
			<span id="Prezime"></span>
			
			<label>Email:</label>
			<input name="mail" type="mail" id="mail" class="contact-form-text" required>
			<span id="Mejl"></span>
			
			<label>Komentar:</label>
			<textarea id="koment" name="opis" rows="8" cols="21" class="contact-form-text" placeholder="Opisite ovde..." required></textarea><br>
			
			<button class="dugme"  type="submit" onclick="provera();">Pošalji</button>
			<button class="dugme"  type="reset" all>Poništi</button>
		</form>
	</div>
	</body>	
</html>