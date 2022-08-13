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
		<?php
			include('PHP/200productos.php');
		?>
		<?php
			include('PHP/1000comentarios.php');
		?>
		<header>
			<ul>
				<li class="LinksMenu">
					<a href="index.php">Home</a>
				</li>
				<li class="LinksMenu">
					<a href="PHP/destacados.php">Destacados</a>
				</li>
				<li class="LinksMenu">
					<a href="PHP/vendidos.php">Mas vendidos</a>
				</li>

			</ul>
		</header>
		<div class="Contenedor">
			<aside>
				<div>
					<i class="fal fa-bars IconoCategoriasPapa"></i>
			    	<h1>Categorias</h1>
				</div>
		    	<ul>
		        	<li id="Escritorio">
						<p>Escritorio</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
		        	<li id="Gamers">
						<p>Gamers</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
		        	<li id="Diseñadores">
						<p>Diseñadores</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
					<li id="Laptops">
						<p>Laptops</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
		        	<li id="Estudiantiles">
						<p>Estudiantiles</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
		        	<li id="Investigadores">
						<p>Investigadores</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
					<li id="Programadores">
						<p>Programadores</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
		        	<li id="Vintage">
						<p>Vintage</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
		        	<li id="Presentaciones">
						<p>Presentaciones</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
					<li id="Empresas">
						<p>Empresas</p>
						<i class="fal fa-arrow-right IconoCategoriasHijos"></i>
					</li>
		    	</ul>
			</aside>
			<div class="ContenedorProductos">
				<h2 class="TituloSecciones">Productos destacados</h2>
				<span class="SeparadorSecciones"></span>
					<?php
						include('PHP/10Random.php');
					?>

				<h2 class="TituloSecciones">Productos mas vendidos</h2>
				<span class="SeparadorSecciones"></span>
				<div class="ContenedorVendidos">
					
				</div>
					
			</div>
		</div>	
		<div class="MetodosPago">
			<img class="ImgMetodos" src="https://ddtech.mx/assets/img/logos-pagos.png?1583611042" alt=""> 
		</div>
		<script type="text/javascript" src="JavaScript/Js.js"></script>
	</body>

</html>
