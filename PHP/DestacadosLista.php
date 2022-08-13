<?php
	include('BDConectada.php');

	echo '<link rel="stylesheet" type="text/css" href="../Css/Home.css">';
	//Aqui hago la consulta de todos los productos.
	$sql = 'SELECT * FROM infoproduct';
	$sql = $db->prepare($sql);
	$sql->execute();
	$MasVendidos = $sql -> fetchAll(PDO::FETCH_OBJ);
	//Aqui simulo como si cada comentario fuera una venta, ordeno los productos de mayor a menor por cantidad de comentarios.
	function sort_by_orden ($a, $b) {
		return $b -> Calificacion - $a -> Calificacion;
	}
	usort($MasVendidos, 'sort_by_orden');
	//Muestro los primeros 10 productos.
	$i = 0;
	
	while($i < count($MasVendidos)) {
		if($MasVendidos[$i] -> Calificacion == 0) $CalificacionPromedio = ' Not rated';
		else $CalificacionPromedio = $MasVendidos[$i] -> Calificacion;
		echo '<a class="LinkProducto" href="../PaginasItems/Producto'.($i + 1).'.html">';
		echo '	<div class="Producto">';
		echo '		<img class="Img" src='.'../Imagenes/Computadora'.(rand(1,10)).'.jpg></img>';
		echo '		<div class="DivInfo">';
		echo '			<p class="Modelo">'.$MasVendidos[$i] -> Marca.' - '.$MasVendidos[$i] -> Modelo.'</p>';
		echo '			<p class="Precio">Precio: $'.$MasVendidos[$i] -> Precio.'</p>';
		echo '      	<p class="Calificacion">Calificacion: '.$CalificacionPromedio.'</p>';
		echo '		</div>';
		echo '	</div>';
		echo '</a>';
		$i++;
	}
?>