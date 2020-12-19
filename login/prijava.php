<?php

/* Ovaj deo skripte tretira matricu $_POST. Ako ta matrica nije definisana ili je prazna, zaustavi izvršavanje programa. */
if (!$_POST) exit;

/* Pretvori matricu u grupu promenljivih (keys) sa odgovarajućim vrednostima (values) */
extract($_POST);

/* Ako nije uneto korisničko ime */
if ($korisnicko_ime == '')
{
	ajax_poruka('Unesite korisničko ime');
}
/* Ako nije uneta lozinka */
else if ($lozinka == '')
{
	ajax_poruka('Unesite lozinku');
}

else if ($korisnicko_ime != 'admin' || $lozinka != 'admin')
{
	ajax_poruka('Niste dobro uneli korisničko ime ili lozinku');
}
/* Uneta je odgovarajuća kombinacija? */
else
{
	/* Podesi informaciju u matrici $_SESSION da je korisnik prijavljen */
	$_SESSION['ulogovan'] = 1;
	ajax_idi_na_stranicu('./logovanje.php');
}

?>