<?php
	require_once 'Usuario.php';
	require_once 'Sede.php';

	class Asesor{
		// Atributos

		public $id;
		public $usuario;
		public $telefono;
		public $sede;

		// Métodos

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['usuario'])) {
				$this->usuario = new Usuario();
				$this->usuario->construir($obj_assoc['usuario']);
			}
			if (isset($obj_assoc['telefono'])) {
				$this->telefono = $obj_assoc['telefono'];
			}
			if (isset($obj_assoc['sede'])) {
				$this->sede = new Sede();
				$this->sede->construir($obj_assoc['sede']);
			}
		}
	}
?>