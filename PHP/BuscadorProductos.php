<?php
	require_once("../Install/BDConectada.php");
	
	$Busqueda = $_POST['Busqueda'];
	if($Busqueda == '') return;
	$sql = "SELECT * FROM infoproduct WHERE Marca LIKE '%".$Busqueda."%' OR Modelo LIKE '%".$Busqueda."%' LIMIT 4";
	$sql = $db->prepare($sql);
	$sql->execute();
	$consultaProductos = $sql -> fetchAll(PDO::FETCH_OBJ);
	$convertirJSON = json_encode($consultaProductos);
	print_r($convertirJSON);
?>