<?php
	require_once '../model/Conexion.php';
	require_once '../model/Rol.php';

	class ControllerRol{
		const TABLA = 'rol';

		public function guardar($rol){
	      $conexion = new Conexion();
	      if($rol->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET rol = :nombre WHERE id = :id');
	         $consulta->bindParam(':nombre', $rol->rol);
	         $consulta->bindParam(':id', $rol->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (rol) VALUES(:nombre)');
	         $consulta->bindParam(':nombre', $rol->rol);
	         $consulta->execute();
	         $rol->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

	    public function getRol($id){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	if ($registro = $consulta->fetch()) {
	       		$rol = new Rol();
	       		$rol->construir($registro);
	       		return $rol;
	       	}
	    }

	    public function getAll(){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
	       	$consulta->execute();
	       	while ($registro = $consulta->fetch()) {
	       		$rol = new Rol();
	       		$rol->construir($registro);
	       		$array[] = $rol;
	       	}
	       	return $array;
	    }
	}
?>