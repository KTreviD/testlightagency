<?php
	function CrearArchivoPagina($IdProducto, $Marca, $Modelo, $Clasificacion, $Especificaciones, $Precio) {
		$PaginaCreada = fopen('PaginasItems\\Producto'.$IdProducto . ".html","x");
		fwrite($PaginaCreada,'<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>'.$IdProducto.'</title>
					<link rel="stylesheet" type="text/css" href="../../Css/Home.css">
					<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
				</head>

				<body>
					<header>
						<ul>
							<li class="LinksMenu">
								<a href="../index.php">Home</a>
							</li>
							<li class="LinksMenu">
								<a href="../destacados.php">Destacados</a>
							</li>
							<li class="LinksMenu">
								<a href="../vendidos.php">Mas vendidos</a>
							</li>
							<div class="BuscadorContenedor">
								<input class="inputBuscador" type="text" name="Busqueda" placeholder="Busca un producto..." autocomplete="off">
								<div class="ContenedorResultados"></div> 	
							</div>
						</ul>
					</header>
					<div class="ContenedorPagina">
						<div class="MitadImagen">
							<img class="ImagenPagina" src="../../Imagenes/Computadora'.substr(strval($IdProducto), -1).'.jpg">
							<p class="PrecioPagina">Precio: $'.$Precio.'</p>
						</div>
						<div class="MitadInfo">
							<h1 class="TituloPagina">'.$Marca.' - '.$Modelo.'</h1>
							<p class="Especificaciones">Especificaciones: '.$Especificaciones.'</p>
							<p class="Clasificacion">Clasificacion: '.$Clasificacion.'.</p>
							<p class="Valoracion"></p>
							<div class="Comentarios">
								<div class="ComentarioTitulo">
									<p class="ComentarioTituloP">Comentarios de los clientes</p>	
								</div>
								<div class="ComentariosContenedor">
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
					<p id="Id">'.$IdProducto.'</p>
					<script type="text/javascript" src="../../JavaScript/ComentariosProductos.js"></script>
					<script type="text/javascript" src="../../JavaScript/BuscadorProducto.js"></script>
				</body>

			</html>');
		fclose($PaginaCreada);
	}

?>