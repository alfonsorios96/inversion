<?php
	require_once '../controller/ControllerInmueble.php';

	$controlador = new ControllerInmueble();
	header("Content-type: application/json; charset=utf8");
	echo json_encode($controlador->getAll());
?>