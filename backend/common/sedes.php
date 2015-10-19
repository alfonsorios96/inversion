<?php
	require_once '../controller/ControllerSede.php';

	$controlador = new ControllerSede();
	header("Content-type: application/json; charset=utf8");
	echo json_encode($controlador->getAll());
?>