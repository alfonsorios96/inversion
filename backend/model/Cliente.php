<?php
	require_once 'Usuario.php';
	require_once 'Estado.php';

	class Cliente{
		// Atributos

		public $id;
		public $usuario;
		public $domicilio;
		public $telefono;
		public $contacto;
		public $curp;
		public $nss;
		public $fnac;
		public $estado;
		public $civil;
		public $notas;

		// Métodos

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['usuario'])) {
				$this->usuario = new Usuario();
				$this->usuario->construir($obj_assoc['usuario']);
			}
			if (isset($obj_assoc['domicilio'])) {
				$this->domicilio = $obj_assoc['domicilio'];
			}
			if (isset($obj_assoc['telefono'])) {
				$this->telefono = $obj_assoc['telefono'];
			}
			if (isset($obj_assoc['contacto'])) {
				$this->contacto = $obj_assoc['contacto'];
			}
			if (isset($obj_assoc['curp'])) {
				$this->curp = $obj_assoc['curp'];
			}
			if (isset($obj_assoc['nss'])) {
				$this->nss = $obj_assoc['nss'];
			}
			if (isset($obj_assoc['fnac'])) {
				$this->fnac = $obj_assoc['fnac'];
			}
			if (isset($obj_assoc['estado'])) {
				$this->estado = new Estado();
				$this->estado->construir($obj_assoc['estado']);
			}
			if (isset($obj_assoc['civil'])) {
				$this->civil = $obj_assoc['civil'];
			}
			if (isset($obj_assoc['notas'])) {
				$this->notas = $obj_assoc['notas'];
			}
		}
	}
?>