<?php
	class Rol{
		// Atributos

		public $id;
		public $rol;

		// Métodos

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['rol'])) {
				$this->rol = $obj_assoc['rol'];
			}
		}
	}
?>