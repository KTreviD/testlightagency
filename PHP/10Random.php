<?php
	include('../Install/BDConectada.php');
	echo '<link rel="stylesheet" type="text/css" href="../Css/Home.css">';
	//Aqui hago la consulta de 10 productos random.
	$sql = 'SELECT * FROM infoproduct order by RAND() LIMIT 10';
	$sql = $db->prepare($sql);
	$sql->execute();
	$consulta10ProductosRand = $sql -> fetchAll(PDO::FETCH_OBJ);
	$i = 0;
	while($i < count($consulta10ProductosRand)) {
		if($consulta10ProductosRand[$i] -> Calificacion == 0) $CalificacionPromedio = ' Not rated';
		else $CalificacionPromedio = $consulta10ProductosRand[$i] -> Calificacion;
		echo '<a class="LinkProducto" href="PaginasItems/Producto'.$consulta10ProductosRand[$i] -> Id.'.html">';
		echo '	<div class="Producto">';
		echo '		<img class="Img" src='.'../Imagenes/Computadora'.substr(strval($consulta10ProductosRand[$i] -> Id), -1).'.jpg></img>';
		echo '		<div class="DivInfo">';
		echo '			<p class="Modelo">'.$consulta10ProductosRand[$i] -> Marca.' - '.$consulta10ProductosRand[$i] -> Modelo.'</p>';
		echo '			<p class="Precio">Precio: $'.$consulta10ProductosRand[$i] -> Precio.'</p>';
		echo '	      <p class="Calificacion">Calificacion: '.$CalificacionPromedio.'</p>';
		echo '		</div>';
		echo '	</div>';
		echo '</a>';
		$i++;
	}
?>