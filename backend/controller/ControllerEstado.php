<?php
	require_once '../model/Conexion.php';
	require_once '../model/Estado.php';

	class ControllerEstado{
		const TABLA = 'estado';

		public function guardar($estado){
	      $conexion = new Conexion();
	      if($estado->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET estado = :nombre WHERE id = :id');
	         $consulta->bindParam(':nombre', $estado->estado);
	         $consulta->bindParam(':id', $estado->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (estado) VALUES(:nombre)');
	         $consulta->bindParam(':nombre', $estado->estado);
	         $consulta->execute();
	         $estado->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

	    public function getEstado($id){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	if ($registro = $consulta->fetch()) {
	       		$estado = new Estado();
	       		$estado->construir($registro);
	       		return $estado;
	       	}
	    }

	    public function getAll(){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
	       	$consulta->execute();
	       	while ($registro = $consulta->fetch()) {
	       		$estado = new Estado();
	       		$estado->construir($registro);
	       		$array[] = $estado;
	       	}
	       	return $array;
	    }
	}
?>