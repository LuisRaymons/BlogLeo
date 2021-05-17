<?php include_once("frontend/config.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Acerca de</title>
		<link rel="stylesheet" type="text/css" href="frontend/plugging/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="frontend/plugging/css/styleheademenu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
		<link rel="shortcut icon" href="frontend/img/logo.ico">

</head>
<body>
	 <?php include_once("header.php"); ?>

	 	<section  id="backgroudcontactpricipal" class="d-flex align-items-center">
			<div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
				<br>
				<br>
				<br>
				<h3>Deja te cuento algo sobre de mi</h3>
				<div class="container">
							<video src="frontend/img/acercaDeMi.mp4" autoplay height="40%" width="60%" >
							</video>
				</div>


		</section>

		<div class="container">
					<p>
						Para muchos novios no hay nada más romántico y especial que la música en vivo, por lo que si ustedes también desean contar con este elemento en su boda, Leo Sax es la opción perfecta. Este saxofonista de alto nivel llevará a su evento canciones únicas, interpretadas con gran técnica, creando así una atmósfera mágica en ese gran día.
					</p>
					<h2>Dentro de los servicios que se ofrecen son: </h2>
					<p>
						Este músico de alto nivel cuenta con toda la experiencia necesaria para hacer frente a un acontecimiento tan preciado como el que están a punto de vivir. Dispone de varias opciones según requieran para ese día tan importante, incluyendo, por ejemplo:
					</p>

					<ul style="list-style:none">
						<li>Acompañamiento en la ceremonia</li>
						<li>Música durante el banquete</li>
						<li>Show para la fiesta</li>
						<li>Acompañamiento con voz</li>
					</ul>

					<h2>¿Qué incluye el paquete de boda?</h2>
					<p>4 diferentes shows para en adecuados para su maravilloso evento cenas entrega de anillo Música para ceremonia religiosa</p>

					<h2>¿Con cuánta anticipación debo ponerme en contacto con usted?</h2>
					<p>De un mes a quince días antes del evento que aún que si es con más tiempo sería mejor</p>
					<h2>Repertorio:</h2>
					<p>Muisca de saxofón bossa nova ,standars jazz , baladas , boleros, baladas en español, baladas en inglés pop movido , música disco Música Para la ceremonia religiosa piano Sax y voz</p>

					<h2>¿Se puede pedir algún tema en especial?</h2>
					<p>Si se puede solo que sea con anticipación de 14 días antes como mínimo</p>

					<h2>Experiencia:</h2>
					<p>Cuento con más de 25 años de experiencia embelleciendo eventos sociales estudie en la escuela de música de la UDG actualmente trabajo en banda de música del estado de Jalisco</p>

					<h2>¿En que Estados de México trabaja?</h2>
					<p>Jalisco</p>

		</div>
		</div>


		<?php include_once("footer.php"); ?>

		<script src="frontend/plugging/jquery/jquery.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/glider-js@1.7.3/glider.min.js"></script>
		<script src="frontend/plugging/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
