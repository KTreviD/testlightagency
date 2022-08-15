<?php
	require_once("../Install/BDConectada.php");
	$Busqueda = $_POST['Busqueda'];
	$sql = 'SELECT * FROM comentarios WHERE Id = '.$Busqueda;
	$sql = $db->prepare($sql);
	$sql->execute();
	$consultaComentarios = $sql -> fetchAll(PDO::FETCH_OBJ);

	print_r(json_encode($consultaComentarios));
?>