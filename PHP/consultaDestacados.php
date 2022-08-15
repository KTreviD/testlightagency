<?php
	require_once("../Install/BDConectada.php");
	$sql = 'SELECT * FROM infoproduct';
	$sql = $db->prepare($sql);
	$sql->execute();
	$consultaProductos = $sql -> fetchAll(PDO::FETCH_OBJ);
	function ordenar ($a, $b) {
		return $b -> Calificacion - $a -> Calificacion;
	}
	usort($consultaProductos, 'ordenar');
	
	print_r(json_encode($consultaProductos));
?>