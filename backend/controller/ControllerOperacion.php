<?php
	require_once '../model/Conexion.php';
	require_once '../model/Operacion.php';

	class ControllerOperacion{
		const TABLA = 'operacion';

		public function guardar($operacion){
	      $conexion = new Conexion();
	      if($operacion->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET operacion = :nombre WHERE id = :id');
	         $consulta->bindParam(':nombre', $operacion->operacion);
	         $consulta->bindParam(':id', $operacion->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (operacion) VALUES(:nombre)');
	         $consulta->bindParam(':nombre', $operacion->operacion);
	         $consulta->execute();
	         $operacion->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

	    public function getOperacion($id){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	if ($registro = $consulta->fetch()) {
	       		$operacion = new Operacion();
	       		$operacion->construir($registro);
	       		return $operacion;
	       	}
	    }

	    public function getAll(){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
	       	$consulta->execute();
	       	while ($registro = $consulta->fetch()) {
	       		$operacion = new Operacion();
	       		$operacion->construir($registro);
	       		$array[] = $operacion;
	       	}
	       	return $array;
	    }
	}
?>