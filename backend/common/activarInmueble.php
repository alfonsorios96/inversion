<?php
	require_once '../controller/ControllerInmueble.php';
	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();
	if (isset($correo) && ($estatus == 3 || $estatus == 1)) {
		if (isset($_GET['id'])) {
			$expediente = $_GET['id'];
			$controlador = new ControllerInmueble();
			$controlador->activar($expediente);
		}
		if ($estatus == 1) {
			header("Location: ../../admin/inmuebles.php");
		}
		if ($estatus == 3) {
			header("Location: ../../asesor/inmuebles.php");
		}
	}
?>