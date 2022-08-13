<?php
	include('BDConectada.php');

	function crearValoresPeticionSQL($numTabla) {
		$valorGlobal = '';
		for($i = 0; $i < 10 ; $i++) {
			switch ($numTabla) {
				case 1:
					$valorGlobal = $valorGlobal . '(:texto'.$i.', :nombre'.$i.', :calificacion'.$i.'),';
					break;
				case 2:
					$valorGlobal = $valorGlobal . '(:marca'.$i.',:modelo'.$i.', :especificaciones'.$i.', :precio'.$i.'),';
					break;
				case 3:
					$valorGlobal = $valorGlobal . '(:clasificacion'.$i.', :subclasificacion'.$i.'),';
					break;
				default:
					break;
			}
		}
		return rtrim($valorGlobal, ",");
	}
	
	$valuesPrimeraTabla = crearValoresPeticionSQL(1);
	$valuesSegundaTabla = crearValoresPeticionSQL(2);
	$valuesTerceraTabla = crearValoresPeticionSQL(3);
	
	$sqlPrimera = "INSERT INTO comentarios(Texto, Nombre, Calificacion) 
		VALUES$valuesPrimeraTabla";
	$sqlPrimera = $db->prepare($sqlPrimera);

	$sqlSegunda = "INSERT INTO infoproduct(Marca, Modelo, Especificaciones, Precio) 
		VALUES$valuesSegundaTabla";
	$sqlSegunda = $db->prepare($sqlSegunda);

	$sqlTercera = "INSERT INTO clasificacion(Clasificacion, SubClasificacion) 
		VALUES$valuesTerceraTabla";
	$sqlTercera = $db->prepare($sqlTercera);


	//Aqui escribes lo que se requiera en los arreglos y eso es lo que se registrara en la base de datos.
	//Variables para los comentarios.
	$texto = array('Muy bueno', 'Me gusto mucho!', 'No tan bueno', 'Tuve algunos problemas', 'Esta si es una buena pc',
	'Me parecio cara', 'Esta a muy buen precio!', 'Excelente', 'No me gusto la grafica', 'Muy buen SSD');
	$nombre = array('Alicia','Carlos','Pedro','Lucas','Juan','Ernesto','Julia','Patricia','Esmeralda','Sofia');
	$calificacion = array(9,8,6,4,8,7,9,10,7,9);
	//Variables la Info.
	$marca = array('Lenovo','HP','ACER','Apple','Alienware','Toshiba','Dell','Asus','Samsung','MSI');
	$modelo = array('Apple iMac','Aurora Alienware','Dell Inspiron One 2320','Dell XPS One 27 Touch',
	'Gateway Compact Desktop','Gateway ZX4300-01e','HP Compaq 500B E6500','HP Omni 220 Quad','HP Omni 27','HP Touchsmart 600');
	$especificaciones = array('Procesador Intel i3 6300, RAM 8 GB, Tarjeta gráfica Nvidia GTX 750, SSD 1TB','Procesador Intel i8 8300, RAM 8 GB, Tarjeta gráfica Nvidia GTX 3550, SSD 2TB',
	'Procesador Intel i7 9600, RAM 10 GB, Tarjeta gráfica Nvidia GTX 3600, SSD 2TB','Procesador Intel i2 6300, RAM 16 GB, Tarjeta gráfica Nvidia GTX 750, SSD 2TB',
	'Procesador Intel i7 7800, RAM 12 GB, Tarjeta gráfica Nvidia GTX 2750, SSD 500MB','Procesador Intel i9 2100, RAM 32 GB, Tarjeta gráfica Nvidia GTX 750, SSD 500MB',
	'Procesador Intel i8 3400, RAM 6 GB, Tarjeta gráfica Nvidia GTX 150, SSD 1TB','Procesador Intel i9 3200, RAM 8 GB, Tarjeta gráfica Nvidia GTX 750, SSD 1TB',
	'Procesador Intel i8 5400, RAM 4 GB, Tarjeta gráfica Nvidia GTX 350, SSD 1TB','Procesador Intel i6 4300, RAM 16 GB, Tarjeta gráfica Nvidia GTX 750, SSD 500MB');
	$precio = array(20000,10000,19000,18000,32000,45000,32000,50000,43000,15000);
	//Variables para los arreglos de las clasificaciones.
	$clasificacion = array('Escritorio','Gamers','Diseñadores','Laptops','Estudiantiles','Investigadores','Programadores','Vintage','Presentaciones','Empresas');
	$subClasificacion = array('Gabinete negro','RGB','Videos','Mini','Equipable','Veloz','Optimizada','80tas','Estetica','Organizada');

	$archivoLog = fopen("archivoLog.txt",'a') or die ('Error al crear');
	
	for($i = 0; $i < 10 ; $i++) {
		//Escribir todos los comentarios en el archivo.
		fwrite($archivoLog, var_export("El comentario con index ".$i." insertado en la tabla comentarios es:". PHP_EOL."Texto: ".$texto[$i]. PHP_EOL."Nombre: ".$nombre[$i].PHP_EOL."Calificacion: ".$calificacion[$i]. PHP_EOL, true));
		//Preparar los parametros SQL de los comentarios.
		$sqlPrimera->bindParam(':texto'.$i,$texto[$i],PDO::PARAM_STR);
		$sqlPrimera->bindParam(':nombre'.$i,$nombre[$i],PDO::PARAM_STR);
		$sqlPrimera->bindParam(':calificacion'.$i,$calificacion[$i],PDO::PARAM_INT);
		//Escribir toda la info de los productos en el archivo.
		fwrite($archivoLog, var_export("El modelo con index ".$i." insertado en la tabla infoproduct es:". PHP_EOL."Marca: ".$marca[$i]. PHP_EOL."Modelo: ".$modelo[$i]. PHP_EOL."Especificaciones: ".$especificaciones[$i].PHP_EOL."Precio: ".$precio[$i].'$'. PHP_EOL, true));
		//Preparar los parametros SQL de la info de los productos.
		$sqlSegunda->bindParam(':marca'.$i,$marca[$i],PDO::PARAM_STR);
		$sqlSegunda->bindParam(':modelo'.$i,$modelo[$i],PDO::PARAM_STR);
		$sqlSegunda->bindParam(':especificaciones'.$i,$especificaciones[$i],PDO::PARAM_STR);
		$sqlSegunda->bindParam(':precio'.$i,$precio[$i],PDO::PARAM_INT);
		//Escribir las categorias en el archivo.
		fwrite($archivoLog, var_export("La clasificacion con index ".$i." insertada en la tabla clasificacion es:". PHP_EOL."Clasificacion: ".$clasificacion[$i]. PHP_EOL."SubClasificacion: ".$subClasificacion[$i].PHP_EOL.PHP_EOL, true));
		//Preparar los parametros SQL de las clasificaciones.
		$sqlTercera->bindParam(':clasificacion'.$i,$clasificacion[$i],PDO::PARAM_STR);
		$sqlTercera->bindParam(':subclasificacion'.$i,$subClasificacion[$i],PDO::PARAM_STR);
	}
	$sqlPrimera->execute();
	$sqlSegunda->execute();
	$sqlTercera->execute();
?>