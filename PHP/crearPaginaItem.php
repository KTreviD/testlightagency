<?php
	
	function CrearArchivoPagina($IdProducto, $Marca, $Modelo, $Clasificacion, $Especificaciones, $Precio) {
		$PaginaCreada = fopen('PaginasItems\\Producto'.$IdProducto . ".html","x");
		fwrite($PaginaCreada,'<!DOCTYPE html>
			<html>
				<head>
					<meta charset="utf-8">
					<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<title>'.$IdProducto.'</title>
					<link rel="stylesheet" type="text/css" href="../Css/Home.css">
				</head>

				<body>
					<header>
						<ul>
							<li class="LinksMenu">
								<a href="../index.php">Home</a>
							</li>
							<li class="LinksMenu">
								<a href="../PHP/destacados.php">Destacados</a>
							</li>
							<li class="LinksMenu">
								<a href="../PHP/vendidos.php">Mas vendidos</a>
							</li>
						</ul>
					</header>
					<div class="ContenedorPagina">
						<div class="MitadImagen">
							<h1 class="TituloPagina">'.$Marca.' - '.$Modelo.'</h1>
							<img class="ImagenPagina" src="../Imagenes/Computadora2.jpg">
							<h3 class="TituloPagina">Precio: '.$Precio.'</h3>
						</div>
						<div class="MitadInfo">
							<p class="Especificaciones">'.$Especificaciones.'</p>
						</div>
					</div>
				</body>

			</html>');
		fclose($PaginaCreada);
	}

?>