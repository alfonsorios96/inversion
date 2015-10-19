<?php
	require_once '../model/Conexion.php';
	require_once '../model/Sede.php';

	class ControllerSede{
		const TABLA = 'sede';

		public function guardar($sede){
	      $conexion = new Conexion();
	      if($sede->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET sede = :nombre, direccion = :direccion, telefono = :telefono WHERE id = :id');
	         $consulta->bindParam(':nombre', $sede->sede);
	         $consulta->bindParam(':direccion', $sede->direccion);
	         $consulta->bindParam(':telefono', $sede->telefono);
	         $consulta->bindParam(':id', $sede->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (sede, direccion, telefono) VALUES(:nombre, :direccion, :telefono)');
	         $consulta->bindParam(':nombre', $sede->sede);
	         $consulta->bindParam(':direccion', $sede->direccion);
	         $consulta->bindParam(':telefono', $sede->telefono);
	         $consulta->execute();
	         $sede->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

	    public function getSede($id){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	if ($registro = $consulta->fetch()) {
	       		$sede = new Sede();
	       		$sede->construir($registro);
	       		return $sede;
	       	}
	    }

	    public function getAll(){
	    	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA);
	       	$consulta->execute();
	       	while ($registro = $consulta->fetch()) {
	       		$sede = new Sede();
	       		$sede->construir($registro);
	       		$array[] = $sede;
	       	}
	       	return $array;
	    }
	}
?>