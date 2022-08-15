<?php
	require_once("../Install/BDConectada.php");
	$Busqueda = $_POST['Busqueda'];
	$sql = 'SELECT * FROM infoproduct WHERE Id = '.$Busqueda;
	$sql = $db->prepare($sql);
	$sql->execute();
	$consultaCalificaciones = $sql -> fetchAll(PDO::FETCH_OBJ);

	print_r(json_encode($consultaCalificaciones));
?>