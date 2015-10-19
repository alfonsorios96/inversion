<?php
	require_once '../model/Conexion.php';
	require_once '../model/asesor.php';
	require_once 'ControllerUsuario.php';
	require_once 'ControllerSede.php';

	class ControllerAsesor{

		const TABLA = 'asesor';

		public function guardar($asesor){
	      $conexion = new Conexion();
	      if($asesor->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET telefono = :telefono, sede_id = :sede WHERE id = :id');

	         $consulta->bindParam(':telefono', $asesor->telefono);
	         $consulta->bindParam(':sede', $asesor->sede->id);
	         $consulta->bindParam(':id', $asesor->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (telefono, sede_id, usuario_id) VALUES(:telefono, :sede, :usuario)');
	         $consulta->bindParam(':sede', $asesor->sede->id);
	         $consulta->bindParam(':telefono', $asesor->telefono);
	         $consulta->bindParam(':usuario', $asesor->usuario->id);
	         $consulta->execute();
	         $asesor->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

		public function getAsesor($usuario){
		   	$conexion = new Conexion();
		   	$ctrlUsuario = new ControllerUsuario();
		   	$ctrlSede = new ControllerSede();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE usuario_id = :user');
	       	$consulta->bindParam(':user', $usuario->id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Asesor();
	       		$nuevo->construir($registro);
	       		$nuevo->usuario = $ctrlUsuario->getUsuario($usuario->correo);
	       		$nuevo->sede = $ctrlSede->getSede($registro['sede_id']);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function getAsesor2($id){
		   	$conexion = new Conexion();
		   	$ctrlUsuario = new ControllerUsuario();
		   	$ctrlSede = new ControllerSede();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Asesor();
	       		$nuevo->construir($registro);
	       		$nuevo->usuario = $ctrlUsuario->getUsuario2($registro['usuario_id']);
	       		$nuevo->sede = $ctrlSede->getSede($registro['sede_id']);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function exist($usuario){
			$flag = FALSE;
			if ($this->getAsesor($usuario) != NULL) {
				$flag = TRUE;
			}
			return $flag;
		}

		public function getAll(){
			$conexion = new Conexion();
		   	$ctrlUsuario = new ControllerUsuario();
		   	$ctrlSede = new ControllerSede();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
	       	$consulta->execute();
	       	while($registro = $consulta->fetch()){
	       		$nuevo = new Asesor();
	       		$nuevo->construir($registro);
	       		$nuevo->usuario = $ctrlUsuario->getUsuario2($registro['usuario_id']);
	       		$nuevo->sede = $ctrlSede->getSede($registro['sede_id']);
	       		if ($nuevo->usuario->estatus == 2) {
	       			continue;
	       		}
	       	   	$array[] = $nuevo;
	       	}
	       	if (isset($array)) {
	       		return $array;
	       	}else{
	       	   	return false;
	       	}
		}
	}
?>