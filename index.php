<?php

include('moduli/navigacija.php');

$stranica = $_GET['stranica'] ?? '';

switch ($stranica) {
	case '' :
		include('moduli/pocetna.php');
		break;
	case 'onama' :
		include('moduli/onama.php');
		break;
	case 'gallery' :
		include('view/gallery.php');
		break;
	case 'zakazi' :
		include('moduli/zakazi.php');
		break;
	case 'obradi' :
		include('moduli/obradi.php');
		break;
	case 'kontakt' :
		include('moduli/kontakt.php');
		break;
	case 'login' :
		include('login/logovanje.php');
		break;
	default :
		echo 'Greška 404! Nemam takvu stranicu.';
		break;
}

include("moduli/header.php");
include('moduli/footer.php');

?>
