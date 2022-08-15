<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Prueba tecnica</title>
		<link rel="stylesheet" type="text/css" href="../Css/Home.css">
		<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
				<div class="BuscadorContenedor">
					<input class="inputBuscador" type="text" name="Busqueda" placeholder="Busca un producto..." autocomplete="off">
					<div class="ContenedorResultados"></div> 	
				</div>
			</ul>
		</header>
		<h2 class="TituloSecciones">Productos mas vendidos</h2>
		<span class="SeparadorSecciones"></span>

		<?php
			include('../PHP/VendidosLista.php');
		?>
		<footer>
			<div class="InfoFooter">
				<p class="TextoFooter">Light UX Agency © 2022</p>
				<p class="TextoFooter">Desarrollado por Carlos Treviño Dueñas.</p>
			</div>	
			<div class="MetodosPago">
				<img class="ImgMetodos" src="https://ddtech.mx/assets/img/logos-pagos.png?1583611042" alt=""> 
			</div>
		</footer>
		<script type="text/javascript" src="../JavaScript/BuscadorPublic.js"></script>
	</body>

</html>
