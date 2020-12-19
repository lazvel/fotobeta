<?php

function proveri_sesiju()
{
	/* Ove dve promenljive se nalaze u glavnom toku programa. Da bi njihove vrednosti ovde mogle da se pročitaju,
	   moraju biti deklarisane kao globalne */
	global $ime_kukija, $session_id;

	/* Da li se podatak o sesiji nalazi u kukiju? */
	if (!$_COOKIE['PHPSESSID'])
	{
		zapocni_sesiju($session_id);
	}
}

function zapocni_sesiju($session_id)
{
	/* Uradi inicijalizaciju */
	$_SESSION['id'] = $session_id;
	$_SESSION['server_name'] = $_SERVER[SERVER_NAME];
	$_SESSION['server_addr'] = $_SERVER[SERVER_ADDR];
	$_SESSION['server_port'] = $_SERVER[SERVER_PORT];
	$_SESSION['remote_addr'] = $_SERVER[REMOTE_ADDR];
	/* Marker koji ukazuje na to da li je korisnik prijavljen ili ne */
	$_SESSION['ulogovan'] = 0;
}

function ajax_poruka($poruka)
{
	/* Ispisivanje poruke na ekranu u alert box-u */
	echo '<script language="javascript" type="text/javascript">alert("'.$poruka.'")</script>';
	/* Prekini izvršavanje programa */
	exit;
}

function ajax_idi_na_stranicu($stranica)
{
	/* Redirekcija pomoću JavaScript-a. Koristiti je kada se stranica ispisuje u iframe-u */
	echo '<script language="javascript" type="text/javascript">window.top.location="'.$stranica.'";</script>';
	/* Prekini izvršavanje programa */
	exit;
}

function idi_na_stranicu($stranica)
{
	/* Redirekcija */
	header("location: ./$stranica");
	/* Prekini izvršavanje programa */
	exit;
}

?>