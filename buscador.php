<?php
	require_once("BDConectada.php");
	$sql = 'SELECT * FROM infoproduct';
	$sql = $db->prepare($sql);
	$sql->execute();
	$consulta10ProductosRand = $sql -> fetchAll(PDO::FETCH_OBJ);
	function sort_by_orden ($a, $b) {
		return $b -> NumCalificaciones - $a -> NumCalificaciones;
	}
	usort($consulta10ProductosRand, 'sort_by_orden');
	print_r(json_encode($consulta10ProductosRand));
?>