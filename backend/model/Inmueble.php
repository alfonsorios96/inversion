<?php
	require_once 'Operacion.php';
	require_once 'Tipo.php';
	require_once 'Cliente.php';

	class Inmueble{
		public $id;
		public $ubicacion;
		public $calle;
		public $nExt;
		public $nInt;
		public $cp;
		public $colonia;
		public $rec;
		public $recDetalle;
		public $ban;
		public $banDetalle;
		public $detalle;
		public $construido;
		public $Stotal;
		public $costoM2;
		public $Ctotal;
		public $instPago;
		public $propia;
		public $adeudo;
		public $fContrato;
		public $fVigencia;
		public $nCredito;
		public $deseado;
		public $comision;
		public $expediente;
		public $num;
		public $estatus;
		public $operacion;
		public $tipo;
		public $cliente;

		public function construir($obj_assoc){
			if (isset($obj_assoc['id'])) {
				$this->id = $obj_assoc['id'];
			}
			if (isset($obj_assoc['ubicacion'])) {
				$this->ubicacion = $obj_assoc['ubicacion'];
			}
			if (isset($obj_assoc['calle'])) {
				$this->calle = $obj_assoc['calle'];
			}
			if (isset($obj_assoc['nExt'])) {
				$this->nExt = $obj_assoc['nExt'];
			}
			if (isset($obj_assoc['nInt'])) {
				$this->nInt = $obj_assoc['nInt'];
			}
			if (isset($obj_assoc['cp'])) {
				$this->cp = $obj_assoc['cp'];
			}
			if (isset($obj_assoc['colonia'])) {
				$this->colonia = $obj_assoc['colonia'];
			}
			if (isset($obj_assoc['rec'])) {
				$this->rec = $obj_assoc['rec'];
			}
			if (isset($obj_assoc['ban'])) {
				$this->ban = $obj_assoc['ban'];
			}
			if (isset($obj_assoc['recDetalle'])) {
				$this->recDetalle = $obj_assoc['recDetalle'];
			}
			if (isset($obj_assoc['banDetalle'])) {
				$this->banDetalle = $obj_assoc['banDetalle'];
			}
			if (isset($obj_assoc['detalle'])) {
				$this->detalle = $obj_assoc['detalle'];
			}
			if (isset($obj_assoc['construido'])) {
				$this->construido = $obj_assoc['construido'];
			}
			if (isset($obj_assoc['Stotal'])) {
				$this->Stotal = $obj_assoc['Stotal'];
			}
			if (isset($obj_assoc['costoM2'])) {
				$this->costoM2 = $obj_assoc['costoM2'];
			}
			if (isset($obj_assoc['Ctotal'])) {
				$this->Ctotal = $obj_assoc['Ctotal'];
			}
			if (isset($obj_assoc['instPago'])) {
				$this->instPago = $obj_assoc['instPago'];
			}
			if (isset($obj_assoc['propia'])) {
				$this->propia = $obj_assoc['propia'];
			}
			if (isset($obj_assoc['adeudo'])) {
				$this->adeudo = $obj_assoc['adeudo'];
			}
			if (isset($obj_assoc['fContrato'])) {
				$this->fContrato = $obj_assoc['fContrato'];
			}
			if (isset($obj_assoc['fVigencia'])) {
				$this->fVigencia = $obj_assoc['fVigencia'];
			}
			if (isset($obj_assoc['nCredito'])) {
				$this->nCredito = $obj_assoc['nCredito'];
			}
			if (isset($obj_assoc['deseado'])) {
				$this->deseado = $obj_assoc['deseado'];
			}
			if (isset($obj_assoc['comision'])) {
				$this->comision = $obj_assoc['comision'];
			}
			if (isset($obj_assoc['expediente'])) {
				$this->expediente = $obj_assoc['expediente'];
			}
			if (isset($obj_assoc['num'])) {
				$this->num = $obj_assoc['num'];
			}
			if (isset($obj_assoc['estatus'])) {
				$this->estatus = $obj_assoc['estatus'];
			}
			if (isset($obj_assoc['operacion'])) {
				$this->operacion = new Operacion();
				$this->operacion->construir($obj_assoc['operacion']);
			}
			if (isset($obj_assoc['tipo'])) {
				$this->tipo = new Tipo();
				$this->tipo->construir($obj_assoc['tipo']);
			}
			if (isset($obj_assoc['cliente'])) {
				$this->cliente = new Cliente();
				$this->cliente->construir($obj_assoc['cliente']);
			}
		}
	}
?>