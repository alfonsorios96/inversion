<?php
	require_once '../controller/ControllerUsuario.php';
	require_once '../model/Usuario.php';
	if (isset($_POST['usuario'])) {
		$obj = $_POST['usuario'];
		$controlador = new ControllerUsuario();
		$usuario = new Usuario();
		$usuario->construir($obj);
		$estatus = $controlador->getSesion($usuario);
		if (!isset($estatus)) {
			$estatus = 0;
		}
		header("Content-type: application/json; charset=utf-8");
		echo json_encode($estatus);
	}
?>