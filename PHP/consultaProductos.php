<?php
	require_once("BDConectada.php");
	$sql = 'SELECT * FROM infoproduct';
	$sql = $db->prepare($sql);
	$sql->execute();
	$consultaProductos = $sql -> fetchAll(PDO::FETCH_OBJ);
	function sort_by_orden ($a, $b) {
		return $b -> NumCalificaciones - $a -> NumCalificaciones;
	}
	usort($consultaProductos, 'sort_by_orden');
	print_r(json_encode($consultaProductos));
?>