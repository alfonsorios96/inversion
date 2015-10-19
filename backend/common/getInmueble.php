<?php
	require_once '../controller/ControllerInmueble.php';

	$id = $_POST['inmueble'];

	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();

	if (isset($correo) && ($estatus == 1 || $estatus == 3)) {
		$controlador = new ControllerInmueble();
		header("Content-type: application/json; charset=utf8");
		echo json_encode($controlador->getInmueble2($id));
	}
?>