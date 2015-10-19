<?php
	require_once '../model/Conexion.php';
	require_once '../model/Cliente.php';
	require_once 'ControllerUsuario.php';

	class ControllerCliente{

		const TABLA = 'cliente';

		public function guardar($cliente){
	      $conexion = new Conexion();
	      if($cliente->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET domicilio = :domicilio, contacto = :contacto, telefono = :telefono, curp = :curp, nss = :nss, civil = :civil, notas = :notas, estado_id = :estado WHERE id = :id');

	         $consulta->bindParam(':domicilio', $cliente->domicilio);
	         $consulta->bindParam(':contacto', $cliente->contacto);
	         $consulta->bindParam(':telefono', $cliente->telefono);
	         $consulta->bindParam(':curp', $cliente->curp);
	         $consulta->bindParam(':nss', $cliente->nss);
	         $consulta->bindParam(':civil', $cliente->civil);
	         $consulta->bindParam(':notas', $cliente->notas);
	         $consulta->bindParam(':estado', $cliente->estado->id);
	         $consulta->bindParam(':id', $cliente->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (domicilio, telefono, usuario_id) VALUES(:domicilio, :telefono, :usuario)');
	         $consulta->bindParam(':domicilio', $cliente->domicilio);
	         $consulta->bindParam(':telefono', $cliente->telefono);
	         $consulta->bindParam(':usuario', $cliente->usuario->id);
	         $consulta->execute();
	         $cliente->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

		public function getCliente($usuario){
		   	$conexion = new Conexion();
		   	$ctrlUsuario = new ControllerUsuario();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE usuario_id = :user');
	       	$consulta->bindParam(':user', $usuario->id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Cliente();
	       		$nuevo->construir($registro);
	       		$nuevo->usuario = $ctrlUsuario->getUsuario($usuario->correo);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function getCliente2($id){
		   	$conexion = new Conexion();
		   	$ctrlUsuario = new ControllerUsuario();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Cliente();
	       		$nuevo->construir($registro);
	       		$nuevo->usuario = $ctrlUsuario->getUsuario2($registro['usuario_id']);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function exist($usuario){
			$flag = FALSE;
			if ($this->getCliente($usuario) != NULL) {
				$flag = TRUE;
			}
			return $flag;
		}
	}
?>