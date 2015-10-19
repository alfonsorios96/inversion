<?php
	require '../controller/ControllerUtil.php';
	require_once '../controller/ControllerInmueble.php';
	require_once '../controller/ControllerCliente.php';
	require_once '../controller/ControllerUsuario.php';

	if (isset($_POST['inmueble'])) {
		$obj = $_POST['inmueble'];

		$inmueble = new Inmueble();
		$inmueble->construir($obj);

		$ctrlInmueble = new ControllerInmueble();
		$ctrlCliente = new ControllerCliente();
		$ctrlUsuario = new ControllerUsuario();

		header('Content-type: application/json; charset=utf-8');

		if ($ctrlCliente->exist($inmueble->cliente->usuario)) {
			$inmueble->cliente->id = 0;
			echo json_encode($inmueble);
		}else{
			if (!$ctrlUsuario->exist($inmueble->cliente->usuario->correo)) {
				$ctrlUsuario->guardar($inmueble->cliente->usuario);	
			}
			$inmueble->cliente->usuario = $ctrlUsuario->getUsuario($inmueble->cliente->usuario->correo);
			$ctrlCliente->guardar($inmueble->cliente);
			$inmueble->cliente = $ctrlCliente->getCliente($inmueble->cliente->usuario);
			$ctrlInmueble->guardar($inmueble);
			$ctrlUsuario->addRol($inmueble->cliente->usuario->correo, 2);
			$expediente =  ControllerUtil::RandomString();
				while($ctrlInmueble->existeExpediente($expediente)){
					$expediente =  ControllerUtil::RandomString();
				}
				$nuevo = $ctrlInmueble->getInmueble($inmueble->cliente);
				$dirmake = mkdir('../../images/inmuebles/' . $expediente, 0777);
				$ctrlInmueble->addExpediente($nuevo->id, $expediente);
			session_start();
			$_SESSION['expediente'] = $expediente;
			echo json_encode($nuevo);	
		}
	}
?>