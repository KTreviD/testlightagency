<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Prueba tecnica</title>
		<link rel="stylesheet" type="text/css" href="Css/Home.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	</head>
	<body>
		<header>
			<ul>
				<li class="LinksMenu">
					<a href="index.php">Home</a>
				</li>
				<li class="LinksMenu">
					<a href="destacados.php">Destacados</a>
				</li>
				<li class="LinksMenu">
					<a href="vendidos.php">Mas vendidos</a>
				</li>
				<li class="LinksMenu Buscador">
					<input placeholder="Escribe..."></input>
				</li>
			</ul>
		</header>
		<h2 class="TituloSecciones">Productos mas vendidos</h2>
		<span class="SeparadorSecciones"></span>

		<?php
			include('VendidosPagina.php');
		?>
	</body>

</html>
