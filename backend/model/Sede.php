<?php
	class Sede{
		public $id;
		public $sede;
		public $direccion;
		public $telefono;

		public function construir($obj_assoc)
		{
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['sede'])) {
				$this->sede = $obj_assoc['sede'];
			}
			if (isset($obj_assoc['direccion'])) {
				$this->direccion = $obj_assoc['direccion'];
			}
			if (isset($obj_assoc['telefono'])) {
				$this->telefono = $obj_assoc['telefono'];
			}
		}
	}
?>