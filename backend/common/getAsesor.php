<?php
	require_once '../controller/ControllerAsesor.php';

	$id = $_POST['asesor'];

	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();

	if (isset($correo) && ($estatus == 1 || $estatus == 3)) {
		$controlador = new ControllerAsesor();
		header("Content-type: application/json; charset=utf8");
		echo json_encode($controlador->getAsesor2($id));
	}
?>