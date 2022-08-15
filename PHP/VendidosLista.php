<?php
	include('../Install/BDConectada.php');

	echo '<link rel="stylesheet" type="text/css" href="../Css/Home.css">';
	//Aqui hago la consulta de todos los productos.
	$sql = 'SELECT * FROM infoproduct';
	$sql = $db->prepare($sql);
	$sql->execute();
	$MasVendidos = $sql -> fetchAll(PDO::FETCH_OBJ);
	//Aqui simulo como si cada comentario fuera una venta, ordeno los productos de mayor a menor por cantidad de comentarios.
	function ordenar ($a, $b) {
		return $b -> NumCalificaciones - $a -> NumCalificaciones;
	}
	usort($MasVendidos, 'ordenar');
	//Muestro los productos en orden de los mas ventidos.
	$i = 0;
	
	while($i < count($MasVendidos)) {
		if($MasVendidos[$i] -> Calificacion == 0) $CalificacionPromedio = ' Not rated';
		else $CalificacionPromedio = $MasVendidos[$i] -> Calificacion;
		echo '<a class="LinkProducto" href="PaginasItems/Producto'.$MasVendidos[$i] -> Id.'.html">';
		echo '	<div class="Producto">';
		echo '		<img class="Img" src='.'../Imagenes/Computadora'.substr(strval($MasVendidos[$i] -> Id), -1).'.jpg></img>';
		echo '		<div class="DivInfo">';
		echo '			<p class="Modelo">'.$MasVendidos[$i] -> Marca.' - '.$MasVendidos[$i] -> Modelo.'</p>';
		echo '			<p class="Precio">Precio: $'.$MasVendidos[$i] -> Precio.'</p>';
		echo '	      <p class="Calificacion">Calificacion: '.$CalificacionPromedio.'</p>';
		echo '		</div>';
		echo '	</div>';
		echo '</a>';
		$i++;
	}
?>