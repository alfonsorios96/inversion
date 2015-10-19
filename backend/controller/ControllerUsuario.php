<?php
	require_once '../model/Conexion.php';
	require_once '../model/Usuario.php';
	require_once '../model/Rol.php';
	require_once 'ControllerRol.php';

	class ControllerUsuario{

		const TABLA = 'usuario';
		const TABLA_ROL = 'usuario_rol';

		public function guardar($usuario){
	      $conexion = new Conexion();
	      if($usuario->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre = :nombre, correo = :correo WHERE id = :id');
	         $consulta->bindParam(':nombre', $usuario->nombre);
	         $consulta->bindParam(':correo', $usuario->correo);
	         $consulta->bindParam(':id', $usuario->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre, correo, clave, estatus) VALUES(:nombre, :correo, :clave, 1)');
	         $consulta->bindParam(':nombre', $usuario->nombre);
	         $consulta->bindParam(':correo', $usuario->correo);
	         $consulta->bindParam(':clave', md5($usuario->clave));
	         $consulta->execute();
	         $usuario->id = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

		public function getUsuario($correo){
		   	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE correo = :correo');
	       	$consulta->bindParam(':correo', $correo);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Usuario();
	       		$nuevo->construir($registro);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function getUsuario2($id){
		   	$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Usuario();
	       		$nuevo->construir($registro);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function exist($correo){
			$flag = FALSE;
			if ($this->getUsuario($correo) != NULL) {
				$flag = TRUE;
			}
			return $flag;
		}

		public function active($correo){
			$flag = FALSE;
			$temp = $this->getUsuario($correo);
			if ($temp->estatus == 1) {
				$flag = TRUE;
			}
			return $flag;
		}

		public function eliminar($id){
			$conexion = new Conexion();
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET estatus = 2 WHERE id = :id');
	         $consulta->bindParam(':id', $id);
	         $consulta->execute();
	      	$conexion = null;
		}

		public function roles($correo){
			if ($this->exist($correo)) {
				$usuario = $this->getUsuario($correo);
				$conexion = new Conexion();
				$roles = array();
		       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA_ROL . ' WHERE usuario_id = :id');
		       	$consulta->bindParam(':id', $usuario->id);
		       	$consulta->execute();
		       	while ($registro = $consulta->fetch()) {
		       		$controlador = new ControllerRol();       		
		       		$array[] = $controlador->getRol($registro['rol_id']);
		       	}
		       	return $array;
			}else{
				return false;
			}
		}

		public function addRol($correo, $rol){
			if ($this->exist($correo)) {
				$usuario = $this->getUsuario($correo);
				$conexion = new Conexion();
				$consulta = $conexion->prepare('INSERT INTO ' . self::TABLA_ROL .' VALUES(:usuario, :rol)');
	         	$consulta->bindParam(':usuario', $usuario->id);
	    	 	$consulta->bindParam(':rol', $rol);
	         	$consulta->execute();
	         	$conexion = null;
			}else{
				return false;
			}
		}

		public function verifSesion($correo, $clave){
			$conexion = new Conexion();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE correo = :correo AND clave = :clave');
	       	$consulta->bindParam(':correo', $correo);
	       	$consulta->bindParam(':clave', md5($clave));
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       	   	return true;
	       	}else{
	       	   	return false;
	       	}
		}

		public function getPermiso($permisos){
			$permiso = 4;
			foreach ($permisos as $rol) {
				$permiso = $rol->id;
			}
			return $permiso;
		}

		public function getSesion($usuario){
			/*
				Estatus de error
				------------------------------
				 0 : Error en el sistema.
				-1 : No existe el usuario.
				-2 : No está activo el usuario.
				-3 : No coincide la clave.
				------------------------------
				Estatus de éxito
				------------------------------
				4 : No tiene permisos asignados
				1 : Administrador
				2 : Cliente
				3 : Asesor 
			*/
			$estatus = 0;
			if (!$this->exist($usuario->correo)) {
				$estatus = -1;
			}else{
				if (!$this->active($usuario->correo)) {
					$estatus = -2;
				}else{
					if ($this->verifSesion($usuario->correo, $usuario->clave)) {
						$permisos = $this->roles($usuario->correo);	
						$estatus = $this->getPermiso($permisos);
						session_start();
						$_SESSION['correo'] = $usuario->correo;
						$_SESSION['estatus'] = $estatus;
						session_write_close();
					}else{
						$estatus = -3;
					}
				}
			}
			return $estatus;
		}
	}
?>