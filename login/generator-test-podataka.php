<?php

$pre = ['Đorđević', 'Marković', 'Petrović', 'Jovanović', 'Lazic', 'Ilic'];
$ime = ['Petar', 'Marko', 'Ana', 'Jelena', 'Nikola', 'Marija'];
$lok = ['Kaluđerica', 'Novi Beograd', 'Vracar', 'Zemun'];
$tip = ['outdoor', 'nightlife', 'vencanje', 'rodjendan'];
$date = ['2020-02-05','2020-02-07','2020-02-10','2020-02-13','2020-02-17','2020-02-18','2020-02-22','2020-02-27','2020-03-14','2020-03-18','2020-03-19','2020-03-21','2020-03-27','2020-03-30','2020-04-15'];

$values = [];

for($i = 0; $i < 75; $i++) {
	$values[] = sprintf("('%s', '%s', '%s', '%s', '%s')",
					$pre[rand(0, count($pre)-1)],
					$ime[rand(0, count($ime)-1)],
					$lok[rand(0, count($lok)-1)],
					$tip[rand(0, count($tip)-1)],
					$date[rand(0, count($date)-1)]
				);
}

$values = sprintf(
			'insert into user (`prezime`, `ime`, `lokacija`, `tip_proslave`, `datum`) values %s',
			implode(',', $values)
		);
print_r($values);

?>