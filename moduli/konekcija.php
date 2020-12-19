<?php 
try{
	$konekcija = new PDO("mysql:host=localhost;dbname=foto_radnja", 'root', '');
	$konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
/* U slučaju da je napravljen izuzetak (došlo je do greške), ispiši odgovarajuću poruku */
catch(PDOException $e) {
	echo "<p>". "Došlo je do greške pri konektovanju sa bazom, molimo Vas pokušajte kasnije..<br>"  . $e->getMessage() . " </p>";
}
?>
<html>
	<head>
		<style>
			p{color: white;font-size: 20pt; margin: 10% 25% 0 25%;}
		</style>
	</head>
</html>