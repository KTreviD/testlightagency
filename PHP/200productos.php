<?php
	include('../Install/BDConectada.php');
	include('crearPaginaItem.php');
	//Aqui checamos si ya existen registros en la base de datos.
	//Asi solo se ejecutara una vez.
	$sql = 'SELECT * FROM infoproduct';
	$sql = $db->prepare($sql);
	$sql->execute();
	$numResultados = $sql -> rowCount();
	if($numResultados !== 0) return;

	function crearValores200Productos() {
		$valorGlobal = '';
		for($i = 0; $i < 200 ; $i++) {
			$valorGlobal = $valorGlobal . '(:marca'.$i.', :modelo'.$i.', :clasificacion'.$i.', :especificaciones'.$i.',:precio'.$i.'),';
		}
		return rtrim($valorGlobal, ",");
	}
	
	$values = crearValores200Productos();
	
	$sql = "INSERT INTO infoproduct(Marca, Modelo, Clasificacion, Especificaciones, Precio) 
		VALUES$values";
	$sql = $db->prepare($sql);

	$marcaData = array('Lenovo','HP','ACER','Apple','Alienware','Toshiba','Dell','Asus','Samsung','MSI','Gateway','Sony','LG');
	$modeloData = array('Laptop ThinkPad X1 Nano','ThinkPad X1 Yoga 6ta Gen','ThinkPad T15p 2da Gen','MacBook Air','MacBook Pro','Apple iMac','Aurora Alienware','Dell Inspiron One 2320','Dell XPS One 27 Touch',
	'Gateway Compact Desktop','Gateway ZX4300-01e','HP Compaq 500B E6500','HP Omni 220 Quad','HP Omni 27','HP Touchsmart 600');
	$clasificacionData = array('Escritorio','Gamers','Diseñadores','Laptops','Estudiantiles','Investigadores','Programadores','Vintage','Presentaciones','Empresas');
	
	$procesadorData = array('Intel Pentium Gold G6400 Dual Core','Intel Core i3-9100','Intel Core i5-10400','AMD Ryzen 5 5500','AMD Ryzen 5 5600');
	$RAMData = array('DDR4 8GB 3200MHz Adata XPG','DDR4 8GB 3200MHz Adata XPG Gammix','DDR4 8GB 3200MHz XPG Spectrix','8GB DDR4 TeamGroup T-Force Elite Plus','DDR4 8GB 2666MHz Kingston Fury Beast 1');
	$graficaData = array('Nvidia GeForce GT 730 2GB','NVIDIA GeForce GT 1030 2GB','Radeon RX 6500 XT 4GB ','NVIDIA GeForce GTX 1650 4GB','NVIDIA Quadro T600 4GB');	
	$tarjetaMadreData = array('MSI A520M-A PRO','Gigabyte B550M AORUS PRO AX','Asus ROG STRIX B550-F GAMING WIFI II','NZXT N7 B550','sus PRIME A520M-K Socket AM4');
	$almacenamientoData = array('240GB 2.5" SATA 3 Acer SA100','240GB 2.5" SATA 3 Gigabyte','120GB 2.5" SATA3 Kingston A400','240GB 2.5" SATA3 Kingston A400','Sata 120GB addlink S20');
	$disipadorCalorData = array('Cooler Master Masterair G200P - 120mm X1','Vetroo V5 White RGB - 120mm X1','Aerocool Cylon 4F ARGB - 120mm X1','Cooler Master Hyper 212 ARGB - 120mm','Aerocool Cylon 4F WH ARGB - 120mm X1');
	$fuentePoderData = array('700W Certificacion 80+ Bronze','Asus Tuf Gaming 650W','Gigabyte GP-P750GM','Cougar GEX650 80+ Gold','750 B5 EVGA / Certificación 80+ Bronze');
	
	$precioRandom = array();
	$marcaRandom = array();
	$modeloRandom = array();
	$clasificacionRand = array();
	$especificaciones = array();
	$procesadorRand = array();
	$RAMRand = array();
	$graficaRand = array();
	$tarjetaMadreRand = array();
	$almacenamientoRand = array();
	$disipadorCalorRand = array();
	$fuentePoderRand = array();

	for($i = 0; $i < 200 ; $i++) {
		$precioRandom[$i] = rand(10000, 60000);
		$marcaRandom[$i] = rand(0,12);
		$modeloRandom[$i] = rand(0,14);
		$clasificacionRand[$i] = rand(0,9);
		$procesadorRand[$i] = rand(0,4);
		$RAMRand[$i] = rand(0,4);
		$graficaRand[$i] = rand(0,4);
		$tarjetaMadreRand[$i] = rand(0,4);
		$almacenamientoRand[$i] = rand(0,4);
		$disipadorCalorRand[$i] = rand(0,4);
		$fuentePoderRand[$i] = rand(0,4);
		//Creo el parrafo de especificaciones con todos sus valores al azar.
		$especificaciones[$i] = $procesadorData[$procesadorRand[$i]].', '.$RAMData[$RAMRand[$i]].', '.
		$graficaData[$graficaRand[$i]].', '.$tarjetaMadreData[$tarjetaMadreRand[$i]].', '.
		$almacenamientoData[$almacenamientoRand[$i]].', '.$disipadorCalorData[$disipadorCalorRand[$i]].', '.
		$fuentePoderData[$fuentePoderRand[$i]].'.';
		//Crear las paginas individuales
		crearArchivoPagina(($i + 1),$marcaData[$marcaRandom[$i]], $modeloData[$modeloRandom[$i]], $clasificacionData[$clasificacionRand[$i]], $especificaciones[$i], $precioRandom[$i]);
		//Preparar los parametros SQL de los productos.
		$sql->bindParam(':marca'.$i,$marcaData[$marcaRandom[$i]],PDO::PARAM_STR);
		$sql->bindParam(':modelo'.$i,$modeloData[$modeloRandom[$i]],PDO::PARAM_STR);
		$sql->bindParam(':clasificacion'.$i,$clasificacionData[$clasificacionRand[$i]],PDO::PARAM_STR);
		$sql->bindParam(':especificaciones'.$i,$especificaciones[$i],PDO::PARAM_STR);
		$sql->bindParam(':precio'.$i,$precioRandom[$i],PDO::PARAM_INT);
	}
	$sql->execute();
	//Faltan los 1000 comentarios, para eso hay que modificar las tablas agregarle la parte de los index,
	//unicos en el producto, referencial nadamas en los comentarios
?>