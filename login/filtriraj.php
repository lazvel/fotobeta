<?php


error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
$scriptname = basename(__FILE__);

$upit = preg_replace('#&?sort(?:field|order)=(?:\w*)#', '', $_SERVER['QUERY_STRING']);

$db = mysqli_connect("localhost","root","","foto_radnja");
if (!$db) die('Nije uspostavljena veza sa bazom podataka.');
mysqli_set_charset($db, 'utf8');

$sortfield = '';
$sortorder = '';

if ($_GET) {

	$sortfield = $_GET['sortfield'];
	$sortorder = $_GET['sortorder'];

	unset($_GET['sortfield']);
	unset($_GET['sortorder']);
}

$sql = "select * from user where %s %s";

$where = [];

foreach($_GET as $k => $v)
	if ($v != '')
		$where[] = "`$k` like '%$v%'";

if (empty($where)) $where[] = 1;

switch($sortfield) {
	case 'user_id' :
	case 'prezime' :
	case 'lokacija' :
	case 'tip_proslave' :
	case 'datum' :
		foreach(['user_id', 'prezime', 'lokacija', 'tip_proslave', 'datum'] AS $sf) {
			$promenljiva = "\$so$sf";
			if ($sortfield == $sf) {
				$so = ($sortorder == 'asc') ? 'desc' : 'asc';
				eval("\$so$sf" . "class='$sortorder';");
			} else {
				$so = 'asc';
			}
			eval("\$so$sf = '$so';");
		}
		break;
	default:
		$sortfield = 'prezime';
		$sortorder = 'asc';
}

if ($sortfield) {
	$sort = "order by $sortfield $sortorder";
}

$sql = sprintf($sql, implode(' AND ', $where), $sort);
$result = mysqli_query($db, $sql);

$rezultat = [];

while($row = mysqli_fetch_assoc($result)) {
	$rezultat[] = $row;
}

$scriptpl = sprintf('./%s?%s', $scriptname, $upit);
$sorttpl = '&sortfield=%s&sortorder=%s';

?>
<!doctype html>
<html>
	<head>
		<meta charset="utf8">
		<link rel="stylesheet" href="./style.css">
	</head>
	<body>
		<h2>Obrazac za filtriranje podataka</h2>
		<ul>
			<li>Unesite u obrazac pojmove za pretragu.</li>
			<li>Kakvi su rezultati pretrage u odnosu na kvalitet unetih informacija?</li>
			<li>
				<p>Kako se SQL ponaša kada radimo sa našim slovima (ćirilica i Gajeva latinica)?</p>
				<p>Pokušajte sledeće varijacije: Đorđević, Djordjević, Djordjevic, Dordevic, Ђорђевић, Дјордјевиц</p>
			</li>
		</ul>
			<a href="./ulogovan.htm">&#10148;Korak unazad~admin panel</a><br>
			<a href="../">&#10148;Povratak na Početnu</a>
		<form method="get">
			<div>
				<label>Ime</label>
				<input type="text" name="ime" value="<?php echo $_GET['ime']; ?>">
			</div>
			<div>
				<label>Prezime</label>
				<input type="text" name="prezime" value="<?php echo $_GET['prezime']; ?>">
			</div>
			<br/>
			<div>
				<label>Lokacija</label>
				<input type="text" name="lokacija" value="<?php echo $_GET['lokacija']; ?>">
			</div>
			<div>
				<label>Tip proslave:</label>
				<input type="text" name="tip_proslave" value="<?php echo $_GET['tip_proslave']; ?>">
			</div>
			<div>
				<label>Datum:</label>
				<input type="text" name="datum" value="<?php echo $_GET['datum']; ?>">
			</div>
			<button type="submit">Traži</button>
		</form>
		<?php if ($upit): ?>
			<h3>URL parametri</h3>
			<div><?php echo $upit; ?></div>
			<h3>SQL upit</h3>
			<div><?php echo $sql; ?></div>
			<h2>Rezultati pretrage</h2>
		<?php endif; ?>
		<?php if (empty($rezultat)): ?>
			<div class="greska">Tabela je prazna. Pokrenite skriptu <b><a href="./generator-test-podataka.php">generator-test-podataka.php</a></b> i dobijene podatke ubacite u bazu.</div>
		<?php else: ?>
		<table>
		<tr>
			<th><a href="<?php echo $scriptpl . sprintf($sorttpl, 'user_id', $soid); ?>" class="<?php echo $soidclass; ?>">user_id</a></th>
			<th><a href="<?php echo $scriptpl . sprintf($sorttpl, 'prezime', $soprezime); ?>" class="<?php echo $soprezimeclass; ?>">Prezime i ime</a></th>
			<th><a href="<?php echo $scriptpl . sprintf($sorttpl, 'lokacija', $solokacija); ?>" class="<?php echo $solokacijaclass; ?>">Lokacija</a></th>
			<th><a href="<?php echo $scriptpl . sprintf($sorttpl, 'tip_proslave', $sotip_proslave); ?>" class="<?php echo $sotip_proslaveclass; ?>">Tip proslave</a></th>
			<th><a href="<?php echo $scriptpl . sprintf($sorttpl, 'datum', $sodatum); ?>" class="<?php echo $sodatumclass; ?>">Datum</a></th>
		</tr>
		<?php foreach($rezultat AS $r): ?>
			<tr>
				<td><?php echo $r['user_id']; ?></td>
				<td><?php echo "{$r['prezime']} {$r['ime']}"; ?></td>
				<td><?php echo "{$r['lokacija']}"; ?></td>
				<td><?php echo $r['tip_proslave']; ?></td>
				<td><?php echo $r['datum']; ?></td>
			</tr>
		<?php endforeach; ?>
		<?php endif; ?>
		</table>
		
	</body>
</html>
