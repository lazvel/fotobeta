<?php

/* Na stranici će se koristiti YU slova. Podesi encoding na UTF8 */
header('Content-Type: text/html; charset=utf-8');

$ime_kukija = 'login';

/* Započni sesiju ili nastavi već započetu na osnovu session_id koji se može zadati pomoću GET ili POST zahteva ili putem kukija */
session_start();

$session_id = session_id();

include('funkcije.php');

proveri_sesiju();	

/* Promenljivoj $akcija dodeli vrednost URL parametra akcija. Ukoliko taj parametar nije definisan, promenljiva će ostati prazna */
$akcija = $_GET['akcija'] ?? '';

/* Ako postoje URL parametri, ali među njima nije parametar akcija, prikaži grešku 404 (nepostojeća stranica) */
if (!empty($_GET) && !$akcija) idi_na_stranicu('error404.htm');
/* Ako promenljiva $akcija ima vrednost, proveri njen sadržaj i na osnovu toga preduzmi odgovarajuću akciju */
else if ($akcija)
{
	switch ($akcija)
	{
		case 'prijava' :
			if ($_POST)
			{
				include('./prijava.php');
			}

			/* Ako je korisnik već prijavljen, nema potrebe da opet ide na obrazac za prijavljivanje. Samo prikaži odgovarajuću poruku.
			   Primetite da dole u glavnom grananju već postoji ista provera. Međutim, ako bismo tu proveru u glavnom grananju premestili
			   ispred provere za akciju, ne bi bilo moguće izvršiti odjavu preko URL parametra. */
			if ($_SESSION['ulogovan'] ?? '')
			{
				include('./ulogovan.htm');
			}
			/* Korisnik nije prijavljen. Prikaži obrazac za prijavljivanje */
			else include('./prijava.htm');

			/* Izađi iz switch bloka */
			break;

		/* action = odjava */
		case 'odjava' :

			/* Podesi informaciju u matrici $_SESSION da korisnik nije prijavljen */
			$_SESSION['ulogovan'] = 0;

			/* Idi na početnu stranicu */
			idi_na_stranicu('../index.php');

			/* Izađi iz switch bloka */
			break;

		/* action = bilo koja vrednost */
		default :

			/* Prikaži grešku 404 (nepostojeća stranica) */
			idi_na_stranicu('error404.htm');
			break;
	}
}
/* Korisnik je prijavljen */
else if ($_SESSION['ulogovan'] ?? '')
{
	include('./ulogovan.htm');
}
/* Korisnik nije prijavljen */
else
{
	include('./nije_ulogovan.htm');
}

?>