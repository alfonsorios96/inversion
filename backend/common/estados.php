<?php
	require_once '../controller/ControllerEstado.php';

	$controlador = new ControllerEstado();
	header("Content-type: application/json; charset=utf8");
	echo json_encode($controlador->getAll());
?>