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
		<?php
			include('../PHP/200productos.php');
		?>
		<?php
			include('../PHP/1000comentarios.php');
		?>

		<header>
			<div>
				<ul class="ul">
					<li class="LinksMenu">
						<a href="index.php">Home</a>
					</li>
					<li class="LinksMenu">
						<a href="destacados.php">Destacados</a>
					</li>
					<li class="LinksMenu">
						<a href="vendidos.php">Mas vendidos</a>
					</li>
				</ul>
				<div class="BuscadorContenedor">
					<input class="inputBuscador" type="text" name="Busqueda" placeholder="Busca un producto..." autocomplete="off">
					<div class="ContenedorResultados"></div> 	
				</div>
			</div>
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
				<h2 class="TituloRandoms">Productos destacados</h2>
				<span class="SeparadorSecciones"></span>
					<?php
						include('../PHP/10Random.php');
					?>
				<div class="ContenedorVendidos">
					<h2 class="TituloSecciones" id="TituloVendidos"></h2>
					<span class="SeparadorSecciones"></span>
					<div class="VendidosProductos" id="VendidosProductos">
					
					</div>
				</div>
				<div class="ContenedorDestacados">
					<h2 class="TituloSecciones" id="TituloDestacados"></h2>
					<span class="SeparadorSecciones"></span>
					<div class="VendidosProductos" id="DestacadosProductos">
					
					</div>
				</div>
					
			</div>
		</div>
		<footer>
			<div class="InfoFooter">
				<p class="TextoFooter">Light UX Agency © 2022</p>
				<p class="TextoFooter">Desarrollado por Carlos Treviño Dueñas.</p>
			</div>	
			<div class="MetodosPago">
				<img class="ImgMetodos" src="https://ddtech.mx/assets/img/logos-pagos.png?1583611042" alt=""> 
			</div>
		</footer>
		<script type="text/javascript" src="../JavaScript/Js.js"></script>
		<script type="text/javascript" src="../JavaScript/BuscadorPublic.js"></script>
	</body>

</html>
