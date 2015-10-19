<?php
	require_once '../controller/ControllerUsuario.php';

	if (isset($_POST['usuario'])) {
		$obj = $_POST['usuario'];

		$ctrlUsuario = new ControllerUsuario();
		$ctrlUsuario->eliminar($obj);

		header('Content-type: application/json; charset=utf-8');
		echo json_encode(1);
	}
?>