<?php
	class Usuario{
		// Atributos

		public $id;
		public $correo;
		public $nombre;
		public $clave;
		public $estatus;

		// Métodos

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['correo'])) {
				$this->correo = $obj_assoc['correo'];
			}
			if (isset($obj_assoc['nombre'])) {
				$this->nombre = $obj_assoc['nombre'];
			}
			if (isset($obj_assoc['clave'])) {
				$this->clave = $obj_assoc['clave'];
			}
			if (isset($obj_assoc['estatus'])) {
				$this->estatus = $obj_assoc['estatus'];
			}
		}
	}
?>