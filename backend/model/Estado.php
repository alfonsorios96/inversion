<?php
	class Estado{
		// Atributos

		public $id;
		public $estado;

		// Métodos

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['estado'])) {
				$this->estado = $obj_assoc['estado'];
			}
		}
	}
?>