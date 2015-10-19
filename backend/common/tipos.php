<?php
	require_once '../controller/ControllerTipo.php';

	$controlador = new ControllerTipo();
	header("Content-type: application/json; charset=utf8");
	echo json_encode($controlador->getAll());
?>