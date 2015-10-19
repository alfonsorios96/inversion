<?php
	require_once '../controller/ControllerInmueble.php';

	$controlador = new ControllerInmueble();

	if (isset($_POST['expediente'])) {
		$expediente = $_POST['expediente'];
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($controlador->getPics($expediente));
	}
?>