<?php
	class Tipo{
		// Atributos

		public $id;
		public $tipo;

		// Métodos

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['tipo'])) {
				$this->tipo = $obj_assoc['tipo'];
			}
		}
	}
?>