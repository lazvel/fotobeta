<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="styles/style.css" type="text/css"/>
		<link href="https://fonts.googleapis.com/css?family=Rokkitt::250&display=swap" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<title>DjuricicPhotos</title>
	</head>
	<body>
	
		<div class="header"></div>
		<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">
			<label for="openSidebarMenu" class="sidebarIconToggle">
				<div class="spinner diagonal part-1"></div>
				<div class="spinner horizontal"></div>
				<div class="spinner diagonal part-2"></div>
			</label>
	
		<div id="sidebarMenu">
			<ul id="sidebarMenuInner">
				<li><a href="./">Početna</a></li>
				<li><a href="./index.php?stranica=onama">O nama</a></li>
				<li>
					<a  href="#">Usluge</a>
					<ul class="menu">
						<li>Fotografisanje</li>
						<li>Snimanje</li>
						<li>Obrada fotografije</li>
						<li>Obrada snimaka</li>
						<li>Montaza snimaka</li>
						<li>Foto-albumi</li>
					</ul>
				</li>
				
				<li>  
					<a href="#">Naš rad</a>
					<ul class="menu">
						<li><a href="view/gallery.php?stranica=gallery">Vencanja</a></li>
						<li><a href="view/gallery.php?stranica=gallery">Rodjendani</a></li>
						<li><a href="view/gallery.php?stranica=gallery">Outdoor</a></li>
						<li><a href="view/gallery.php?stranica=gallery">Nightlife</a></li>
					</ul>
				</li>
				<a href="./index.php?stranica=zakazi"><li>Zakaži</li></a>
				<a href="./index.php?stranica=obradi"><li>Obradi fotke</li></a>
				<a href="./index.php?stranica=kontakt"><li>Kontakt</li></a>
				<a href="login/logovanje.php?stranica=login"><li>Login</li></a>
			</ul>
		</div>
	<script src="moduli/main.js"></script>
	</body>
	
</html>