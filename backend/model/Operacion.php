<?php
	class Operacion{
		// Atributos

		public $id;
		public $operacion;

		// Métodos

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['operacion'])) {
				$this->operacion = $obj_assoc['operacion'];
			}
		}
	}
?>