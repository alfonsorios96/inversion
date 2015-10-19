<?php
	require_once '../model/Conexion.php';
	require_once '../model/Inmueble.php';
	require_once 'ControllerTipo.php';
	require_once 'ControllerOperacion.php';
	require_once 'ControllerCliente.php';

	class ControllerInmueble{
		const TABLA = 'inmueble';
		const TABLA_VENTA = 'venta';

		public function guardar($inmueble){
	      $conexion = new Conexion();
	      if($inmueble->id) /*Modifica*/ {
	         $consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET ubicacion = :ubicacion, calle = :calle, nExt = :nExt, nInt = :nInt, cp = :cp, colonia = :colonia, rec = :rec, recDetalle = :recDetalle, ban = :ban, banDetalle = :banDetalle, detalle = :detalle, num = :num, construido = :construido, Stotal = :Stotal, costoM2 = :costoM2, Ctotal = :Ctotal, instPago = :instPago, propia = :propia, adeudo = :adeudo, fContrato = :fContrato, fVigencia = :fVigencia, nCredito = :nCredito, deseado = :deseado, comision = :comision WHERE id = :id');
	         $consulta->bindParam(':ubicacion', $inmueble->ubicacion);
	         $consulta->bindParam(':calle', $inmueble->calle);
	         $consulta->bindParam(':nExt', $inmueble->nExt);
	         $consulta->bindParam(':colonia', $inmueble->colonia);
	         $consulta->bindParam(':rec', $inmueble->rec);
	         $consulta->bindParam(':ban', $inmueble->ban);
	         $consulta->bindParam(':detalle', $inmueble->detalle);
	         $consulta->bindParam(':propia', $inmueble->propia);
	         $consulta->bindParam(':deseado', $inmueble->deseado);

			 $consulta->bindParam(':nInt', $inmueble->nInt);
			 $consulta->bindParam(':cp', $inmueble->cp);
			 $consulta->bindParam(':recDetalle', $inmueble->recDetalle);
			 $consulta->bindParam(':banDetalle', $inmueble->banDetalle);
			 $consulta->bindParam(':construido', $inmueble->construido);
			 $consulta->bindParam(':Stotal', $inmueble->Stotal);
			 $consulta->bindParam(':costoM2', $inmueble->costoM2);
			 $consulta->bindParam(':Ctotal', $inmueble->Ctotal);
			 $consulta->bindParam(':instPago', $inmueble->instPago);
			 $consulta->bindParam(':adeudo', $inmueble->adeudo);
			 $consulta->bindParam(':fContrato', $inmueble->fContrato);
			 $consulta->bindParam(':fVigencia', $inmueble->fVigencia);
			 $consulta->bindParam(':nCredito', $inmueble->nCredito);
			 $consulta->bindParam(':comision', $inmueble->comision);
			 $consulta->bindParam(':num', $inmueble->num);

			 $consulta->bindParam(':id', $inmueble->id);
	         $consulta->execute();
	      }else /*Inserta*/ {
	         $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (ubicacion, calle, nExt, colonia, rec, ban, detalle, propia, deseado, tipo_id, cliente_id, operacion_id, estatus) VALUES(:ubicacion, :calle, :nExt, :colonia, :rec, :ban, :detalle, :propia, :deseado, :tipo, :cliente, 1, 2)');
	         $consulta->bindParam(':ubicacion', $inmueble->ubicacion);
	         $consulta->bindParam(':calle', $inmueble->calle);
	         $consulta->bindParam(':nExt', $inmueble->nExt);
	         $consulta->bindParam(':colonia', $inmueble->colonia);
	         $consulta->bindParam(':rec', $inmueble->rec);
	         $consulta->bindParam(':ban', $inmueble->ban);
	         $consulta->bindParam(':detalle', $inmueble->detalle);
	         $consulta->bindParam(':propia', $inmueble->propia);
	         $consulta->bindParam(':deseado', $inmueble->deseado);
	         $consulta->bindParam(':tipo', $inmueble->tipo->id);
	         $consulta->bindParam(':cliente', $inmueble->cliente->id);
	         $consulta->execute();
	         $inmueble->id = $conexion->lastInsertId();
	         $inmueble->expediente = $conexion->lastInsertId();
	      }
	      $conexion = null;
	    }

	    public function getInmueble($cliente){
		   	$conexion = new Conexion();
		   	$ctrlTipo = new ControllerTipo();
		   	$ctrlOperacion = new ControllerOperacion();
		   	$ctrlCliente = new ControllerCliente();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE cliente_id = :id');
	       	$consulta->bindParam(':id', $cliente->id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Inmueble();
	       		$nuevo->construir($registro);
	       		$nuevo->cliente = $ctrlCliente->getCliente2($registro['cliente_id']);
	       		$nuevo->tipo = $ctrlTipo->getTipo($registro['tipo_id']);
	       		$nuevo->operacion = $ctrlOperacion->getOperacion($registro['operacion_id']);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function getInmueble2($id){
		   	$conexion = new Conexion();
		   	$ctrlTipo = new ControllerTipo();
		   	$ctrlOperacion = new ControllerOperacion();
		   	$ctrlCliente = new ControllerCliente();
	       	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		$nuevo = new Inmueble();
	       		$nuevo->construir($registro);
	       		$nuevo->cliente = $ctrlCliente->getCliente2($registro['cliente_id']);
	       		$nuevo->tipo = $ctrlTipo->getTipo($registro['tipo_id']);
	       		$nuevo->operacion = $ctrlOperacion->getOperacion($registro['operacion_id']);
	       	   	return $nuevo;
	       	}else{
	       	   	return false;
	       	}
		}

		public function getAll($sts = 1){
			$conexion = new Conexion();
		   	$ctrlTipo = new ControllerTipo();
		   	$ctrlOperacion = new ControllerOperacion();
		   	$ctrlCliente = new ControllerCliente();
		   	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE estatus = :estatus');
		   	$consulta->bindParam(':estatus', $sts);
	       	$consulta->execute();
	       	while($registro = $consulta->fetch()){
	       		$nuevo = new Inmueble();
	       		$nuevo->construir($registro);
	       		$nuevo->cliente = $ctrlCliente->getCliente2($registro['cliente_id']);
	       		$nuevo->tipo = $ctrlTipo->getTipo($registro['tipo_id']);
	       		$nuevo->operacion = $ctrlOperacion->getOperacion($registro['operacion_id']);
	       		$array[] = $nuevo;
	       	}
	       	return $array;
		}

		public function getColonias($sts = 1){
			$conexion = new Conexion();
		   	$ctrlTipo = new ControllerTipo();
		   	$ctrlOperacion = new ControllerOperacion();
		   	$ctrlCliente = new ControllerCliente();
		   	$consulta = $conexion->prepare('SELECT colonia FROM ' . self::TABLA . ' WHERE estatus = :estatus');
		   	$consulta->bindParam(':estatus', $sts);
	       	$consulta->execute();
	       	while($registro = $consulta->fetch()){
	       		$array[] = $registro;
	       	}
	       	return $array;
		}

		public function contains($filtro){
			$conexion = new Conexion();
		   	$ctrlTipo = new ControllerTipo();
		   	$ctrlOperacion = new ControllerOperacion();
		   	$ctrlCliente = new ControllerCliente();
		   	$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE colonia = :filtro OR tipo_id = :filtro');
		   	$consulta->bindParam(':filtro', $filtro);
	       	$consulta->execute();
	       	while($registro = $consulta->fetch()){
	       		$nuevo = new Inmueble();
	       		$nuevo->construir($registro);
	       		$nuevo->cliente = $ctrlCliente->getCliente2($registro['cliente_id']);
	       		$nuevo->tipo = $ctrlTipo->getTipo($registro['tipo_id']);
	       		$nuevo->operacion = $ctrlOperacion->getOperacion($registro['operacion_id']);
	       		$array[] = $nuevo;
	       	}
	       	if (empty($array)) {
	       		return false;
	       	}
	       	return $array;
		}

		public function exist($id){
			$conexion = new Conexion();
			$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE id = :id');
	       	$consulta->bindParam(':id', $id);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		return true;
	       	}else{
	       	   	return false;
	       	}
		}

		public function existeExpediente($str){
			$conexion = new Conexion();
			$consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' WHERE expediente = :exp');
	       	$consulta->bindParam(':exp', $str);
	       	$consulta->execute();
	       	$registro = $consulta->fetch();
	       	if($registro){
	       		return true;
	       	}else{
	       	   	return false;
	       	}
		}

		public function addExpediente($id, $str){
			$conexion = new Conexion();
			$consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET expediente = :expediente WHERE id = :id');
         	$consulta->bindParam(':expediente', $str);
         	$consulta->bindParam(':id', $id);
         	$consulta->execute();
         	$conexion = null;
		}

		public function activar($expediente){
			 $conexion = new Conexion();
			 if ($this->existeExpediente($expediente)) {
			 	$consulta = $conexion->prepare('UPDATE ' . self::TABLA .' SET estatus = 1 WHERE expediente = :id');
			 	$consulta->bindParam(':id', $expediente);
			 	$consulta->execute();
			 }
		}

		public function getPics($expediente){
			$root = $this->get_relative_url(dirname($_SERVER['SCRIPT_FILENAME']), 2);
			$array = scandir($root.'/images/inmuebles/'.$expediente, 1);
			$final = false;
			foreach ($array as $value) {
				$jpg   = '.jpg';
				$png   = '.png';
				$pos1 = strpos($value, $jpg);
				$pos2 = strpos($value, $png);

				if ($pos1 == true || $pos2 == true) {
				    $final[] = $value;
				}
			}
			return $final;
		}

		protected function get_relative_url($str = null, $level = 0){
	        $final = "";
	        $components = explode("/", $str);
	        $tam = count($components);
	        $cont = 0;
	        foreach ($components as $value) {
	            $final .= $components[$cont].'/';
	            $cont++;
	            if ($cont >= ($tam - $level)) {
	                break;
	            }
	        }
	        return $final;
	    }
	}
?>