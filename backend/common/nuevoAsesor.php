<?php
	require_once '../controller/ControllerAsesor.php';
	require_once '../controller/ControllerUsuario.php';

	if (isset($_POST['asesor'])) {
		$obj = $_POST['asesor'];

		$asesor = new Asesor();
		$asesor->construir($obj);

		$ctrlAsesor = new ControllerAsesor();
		$ctrlUsuario = new ControllerUsuario();

		header('Content-type: application/json; charset=utf-8');

		if ($ctrlAsesor->exist($asesor->usuario)) {
			$tempUsuario = $ctrlUsuario->getUsuario($asesor->usuario->correo);
			$asesor->usuario->id = $tempUsuario->id;
			$ctrlUsuario->guardar($asesor->usuario);	
			$ctrlAsesor->guardar($asesor);
			echo json_encode($asesor);
		}else{
			if (!$ctrlUsuario->exist($asesor->usuario->correo)) {
				$ctrlUsuario->guardar($asesor->usuario);
				$asesor->usuario = $ctrlUsuario->getUsuario($asesor->usuario->correo);
			}
			$ctrlAsesor->guardar($asesor);
			$nuevo = $ctrlAsesor->getAsesor($asesor->usuario);
			$ctrlUsuario->addRol($asesor->usuario->correo, 3);
			echo json_encode($nuevo);
		}
	}
?>