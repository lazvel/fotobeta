<?php
//setting header to json
header('Content-Type: application/json');

try {
	
	$konekcija = new PDO("mysql:host=localhost;dbname=foto_radnja", 'root', '');

	$konekcija->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$upit = $konekcija->prepare("SELECT lokacija, COUNT(lokacija)  as number FROM user GROUP BY lokacija");

	$upit->execute();
	

	$upit->setFetchMode(PDO::FETCH_ASSOC);
	
	foreach($upit->fetchAll() AS $k => $v) {
		$data[] = $v;
	}
	
	$konekcija = null;
	
	print json_encode($data);
}
/* U slučaju da je napravljen izuzetak (došlo je do greške), ispiši odgovarajuću poruku */
catch(PDOException $e) {
	echo "Greška: " . $e->getMessage();
}