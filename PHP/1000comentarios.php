<?php
	include('BDConectada.php');
	//Asi solo se ejecutara una vez.
	$sql = 'SELECT * FROM comentarios';
	$sql = $db->prepare($sql);
	$sql->execute();
	$numResultados = $sql -> rowCount();
	if($numResultados !== 0) return;

	function crearValores1000Coments() {
		$valorGlobal = '';
		for($i = 0; $i < 1000 ; $i++) {
			$valorGlobal = $valorGlobal . '(:id'.$i.',:texto'.$i.', :nombre'.$i.', :calificacion'.$i.'),';
		}
		return rtrim($valorGlobal, ",");
	}
	
	$values = crearValores1000Coments();
	
	$sql = "INSERT INTO comentarios(Id, Texto, Nombre, Calificacion) 
		VALUES$values";
	$sql = $db->prepare($sql);

	$texto = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et 
	dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.';
	$nombreData = array('Carlos','Pedro','Juanito','Esmeralda','Sofia','Renata','Patricia','Ana','Maria','Fernanda',
	'Gustavo','Saul','Antonio','Antonieta','Carolina','Estefania','Armando','Paola','Enrique','Eden');
	$calificacionRand = array();
	$nombreRand = array();
	$comentId = array();
	for($i = 0; $i < 1000 ; $i++) {
		$comentId[$i] = rand(1,200);
		$calificacionRand[$i] = rand(0,10);
		$nombreRand[$i] = rand(0,19);
		//Preparar los parametros SQL de los productos.
		$sql->bindParam(':id'.$i,$comentId[$i],PDO::PARAM_INT);
		$sql->bindParam(':texto'.$i,$texto,PDO::PARAM_STR);
		$sql->bindParam(':nombre'.$i,$nombreData[$nombreRand[$i]],PDO::PARAM_STR);
		$sql->bindParam(':calificacion'.$i,$calificacionRand[$i],PDO::PARAM_INT);
		//Aqui estamos cambiando en el producto su calificacion segun lo que haya puesto el usuario.
		//Esto es tardado debido a que son muchas peticiones SQL juntas.
		//Esto funcionaria en un caso real de 1 comentario a la vez y no se tardaria tanto como en este ejemplo que insertamos 1000 al mismo tiempo.
		//En la consulta "INSERT" Se puede hacer la cantidad que quieras de inserciones a la tabla.
		//Con la consulta "UPDATE" funciona de 1 a la vez, por eso no lo hago como lo hice antes con el "INSERT".
		$sqlUpdateCalificacion = "UPDATE infoproduct SET Calificacion = ((Calificacion * NumCalificaciones) + $calificacionRand[$i]) / (NumCalificaciones + 1) WHERE Id = $comentId[$i]";
		$sqlUpdateCalificacion = $db->prepare($sqlUpdateCalificacion);
		$sqlUpdateCalificacion->execute();
		$sqlUpdateVecesCalificado = "UPDATE infoproduct SET NumCalificaciones = NumCalificaciones + 1 WHERE Id = $comentId[$i]";
		$sqlUpdateVecesCalificado = $db->prepare($sqlUpdateVecesCalificado);
		$sqlUpdateVecesCalificado->execute();
	}
	$sql->execute();

	
	//Faltan los 1000 comentarios, para eso hay que modificar las tablas agregarle la parte de los index,
	//unicos en el producto, referencial nadamas en los comentarios
?>