<?php 
	
	require_once("../controller/AdvertenciasController.class.php");

	$advController = new AdvertenciasController();
	var_dump($advController->getAdvertenciaDB());
	



?>