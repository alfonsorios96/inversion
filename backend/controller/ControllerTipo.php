<?php
	require_once '../model/Conexion.php';
	require_once '../model/Tipo.php';

	class ControllerTipo{
		const TABLA = 'tipo';

		public function guardar($tipo){
	      $conexion = new Conexion();
	      if($tipo->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET tipo = :nombre WHERE id = :id');
	         $consulta->bindParam(':nombre', $tipo->tipo);
	         $consulta->bindParam(':id', $tipo->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (tipo) VALUES(:nombre)');
	         $consulta->bindParam(':nombre', $tipo->tipo);
	         $consulta->execute();
	         $tipo->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

	    public function getTipo($id){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	if ($registro = $consulta->fetch()) {
	       		$tipo = new Tipo();
	       		$tipo->construir($registro);
	       		return $tipo;
	       	}
	    }

	    public function getAll(){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
	       	$consulta->execute();
	       	while ($registro = $consulta->fetch()) {
	       		$tipo = new Tipo();
	       		$tipo->construir($registro);
	       		$array[] = $tipo;
	       	}
	       	return $array;
	    }
	}
?>