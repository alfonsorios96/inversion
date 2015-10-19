<?php
	require_once '../controller/ControllerInmueble.php';
	header("Content-type: application/json; charset=utf8");

	$controlador = new ControllerInmueble();

	if (isset($_POST['filtros'])) {
		$filtro = $_POST['filtros'];
		if ($controlador->contains($filtro) == false) {
			echo json_encode("");
		}else{
			echo json_encode($controlador->contains($filtro));
		}
	}else{
		echo json_encode($controlador->getAll());
	}
?>