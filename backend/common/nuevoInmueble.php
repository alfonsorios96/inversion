<?php
	require '../controller/ControllerUtil.php';
	require_once '../controller/ControllerInmueble.php';
	require_once '../controller/ControllerCliente.php';
	require_once '../controller/ControllerUsuario.php';

	/*
		Si existe el inmueble
		Actualizamos usuario, cliente e inmueble
		obteniendo las ID

		De lo contrario, creamos usuario, cliente e inmueble y asignamos expediente.
	*/

	if (isset($_POST['inmueble'])) {
		$obj = $_POST['inmueble'];

		$inmueble = new Inmueble();
		$inmueble->construir($obj);

		$ctrlInmueble = new ControllerInmueble();
		$ctrlCliente = new ControllerCliente();
		$ctrlUsuario = new ControllerUsuario();

		header('Content-type: application/json; charset=utf-8');

		if ($ctrlInmueble->exist($inmueble->id)) {
			// Actualizar la información.
			if ($ctrlUsuario->exist($inmueble->cliente->usuario->correo)) {
				$temp_usuario = $ctrlUsuario->getUsuario($inmueble->cliente->usuario->correo);
				$inmueble->cliente->usuario->id = $temp_usuario->id;
			}

			if ($ctrlCliente->exist($inmueble->cliente->usuario)) {
				$temp_cliente = $ctrlCliente->getCliente($inmueble->cliente->usuario);
				$inmueble->cliente->id = $temp_cliente->id;
			}

			$ctrlUsuario->guardar($inmueble->cliente->usuario);	

				$inmueble->cliente->usuario = $ctrlUsuario->getUsuario($inmueble->cliente->usuario->correo);

			$ctrlCliente->guardar($inmueble->cliente);

				$inmueble->cliente = $ctrlCliente->getCliente($inmueble->cliente->usuario);

			$ctrlInmueble->guardar($inmueble);

			$expediente = $inmueble->expediente;

			$nuevo = $inmueble;

		}else{
			$ctrlUsuario->addRol($inmueble->cliente->usuario->correo, 2);

			$expediente =  ControllerUtil::RandomString();
			while($ctrlInmueble->existeExpediente($expediente)){
				$expediente =  ControllerUtil::RandomString();
			}
			$nuevo = $ctrlInmueble->getInmueble($inmueble->cliente);
			$dirmake = mkdir('../../images/inmuebles/' . $expediente, 0777);
			$ctrlInmueble->addExpediente($nuevo->id, $expediente);

		}
			session_start();
			$_SESSION['expediente'] = $expediente;
			echo json_encode($nuevo);	
	}
?>