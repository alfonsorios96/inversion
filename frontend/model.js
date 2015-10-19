var Usuario = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.correo = ko.observable(data ? data.correo : "");
	self.nombre = ko.observable(data ? data.nombre : "");
	self.clave = ko.observable(data ? data.clave : "");
	self.estatus = ko.observable(data ? data.estatus : "");

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.correo(data ? data.correo : "");
		self.nombre(data ? data.nombre : "");
		self.clave(data ? data.clave : "");
		self.estatus(data ? data.estatus : "");		
	}

	self.limpiar = function(){
		self.id("");
		self.correo("");
		self.nombre("");
		self.clave("");
		self.estatus("");
	}
}

var Estado = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.estado = ko.observable(data ? data.estado : "");	

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.estado(data ? data.estado : "");		
	}

	self.limpiar = function(){
		self.id("");
		self.estado("");	
	}
}

var Sede = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.sede = ko.observable(data ? data.sede : "");
	self.direccion = ko.observable(data ? data.direccion : "");
	self.telefono = ko.observable(data ? data.telefono : "");	

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.sede(data ? data.sede : "");
		self.direccion(data ? data.direccion : "");
		self.telefono(data ? data.telefono : "");
	}

	self.limpiar = function(){
		self.id("");
		self.sede("");
		self.direccion("");
		self.telefono("");
	}
}

var Asesor = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.telefono = ko.observable(data ? data.telefono : "");	
	self.usuario = new Usuario(data ? data.usuario : "");
	self.sede = new Sede(data ? data.sede : "");

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.telefono(data ? data.telefono : "");	
		self.usuario.cargar(data ? data.usuario : "");
		self.sede.cargar(data ? data.sede : "");	
	}

	self.limpiar = function(){
		self.id("");
		self.telefono("");	
		self.usuario.limpiar();
		self.sede.limpiar();
	}
}

var Cliente = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.domicilio = ko.observable(data ? data.domicilio : "");
	self.telefono = ko.observable(data ? data.telefono : "");
	self.contacto = ko.observable(data ? data.contacto : "");
	self.curp = ko.observable(data ? data.curp : "");
	self.nss = ko.observable(data ? data.nss : "");
	self.civil = ko.observable(data ? data.civil : "");
	self.notas = ko.observable(data ? data.notas : "");
	self.estado = new Estado(data ? data.estado : "");
	self.usuario = new Usuario(data ? data.usuario : "");

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.domicilio(data ? data.domicilio : "");	
		self.telefono(data ? data.telefono : "");
		self.contacto(data ? data.contacto : "");
		self.curp(data ? data.curp : "");
		self.nss(data ? data.nss : "");
		self.civil(data ? data.civil : "");
		self.notas(data ? data.notas : "");
		self.estado.cargar(data ? data.estado : "");
		self.usuario.cargar(data ? data.usuario : "");
	}

	self.limpiar = function(){
		self.id("");
		self.domicilio("");
		self.telefono("");
		self.contacto("");
		self.curp("");
		self.nss("");
		self.civil("");
		self.notas("");
		self.estado.limpiar();
		self.usuario.limpiar();
	}
}

var Operacion = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.operacion = ko.observable(data ? data.operacion : "");	

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.operacion(data ? data.operacion : "");		
	}

	self.limpiar = function(){
		self.id("");
		self.operacion("");	
	}
}

var Tipo = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.tipo = ko.observable(data ? data.tipo : "");	

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.tipo(data ? data.tipo : "");		
	}

	self.limpiar = function(){
		self.id("");
		self.tipo("");	
	}
}

var Inmueble = function(data){
	var self = this;

	self.id = ko.observable(data ? data.id : "");
	self.ubicacion = ko.observable(data ? data.ubicacion : "");
	self.calle = ko.observable(data ? data.calle : "");
	self.nExt = ko.observable(data ? data.nExt : "");
	self.nInt = ko.observable(data ? data.nInt : "");
	self.cp = ko.observable(data ? data.cp : "");
	self.colonia = ko.observable(data ? data.colonia : "");
	self.rec = ko.observable(data ? data.rec : "");
	self.recDetalle = ko.observable(data ? data.recDetalle : "");
	self.ban = ko.observable(data ? data.ban : "");
	self.banDetalle = ko.observable(data ? data.banDetalle : "");
	self.detalle = ko.observable(data ? data.detalle : "");
	self.construido = ko.observable(data ? data.construido : "");
	self.Stotal = ko.observable(data ? data.Stotal : "");
	self.costoM2 = ko.observable(data ? data.costoM2 : "");
	self.Ctotal = ko.observable(data ? data.Ctotal : "");
	self.instPago = ko.observable(data ? data.instPago : "");
	self.propia = ko.observable(data ? data.propia : "");
	self.adeudo = ko.observable(data ? data.adeudo : "");
	self.fContrato = ko.observable(data ? data.fContrato : "");
	self.fVigencia = ko.observable(data ? data.fVigencia : "");
	self.nCredito = ko.observable(data ? data.nCredito : "");
	self.deseado = ko.observable(data ? data.deseado : "");
	self.comision = ko.observable(data ? data.comision : 1);
	self.expediente = ko.observable(data ? data.expediente : "");
	self.num = ko.observable(data ? data.num : "");
	self.estatus = ko.observable(data ? data.estatus : "");
	self.operacion = new Operacion(data ? data.operacion : "");
	self.tipo = new Tipo(data ? data.tipo : "");
	self.cliente = new Cliente(data ? data.cliente : "");

	self.cargar = function(data){
		self.id(data ? data.id : "");
		self.ubicacion(data ? data.ubicacion : "");
		self.calle(data ? data.calle : "");
		self.nExt(data ? data.nExt : "");
		self.nInt(data ? data.nInt : "");
		self.cp(data ? data.cp : "");
		self.colonia(data ? data.colonia : "");
		self.rec(data ? data.rec : "");
		self.recDetalle(data ? data.recDetalle : "");
		self.ban(data ? data.ban : "");
		self.banDetalle(data ? data.banDetalle : "");
		self.detalle(data ? data.detalle : "");
		self.construido(data ? data.construido : "");
		self.Stotal(data ? data.Stotal : "");
		self.costoM2(data ? data.costoM2 : "");
		self.Ctotal(data ? data.Ctotal : "");
		self.instPago(data ? data.instPago : "");
		self.propia(data ? data.propia : "");
		self.adeudo(data ? data.adeudo : "");
		self.fContrato(data ? data.fContrato : "");
		self.fVigencia(data ? data.fVigencia : "");
		self.nCredito(data ? data.nCredito : "");
		self.deseado(data ? data.deseado : "");
		self.comision(data ? data.comision : 1);
		self.expediente(data ? data.expediente : "");
		self.num(data ? data.num : "");
		self.estatus(data ? data.estatus : "");
		self.operacion.cargar(data ? data.operacion : "");
		self.tipo.cargar(data ? data.tipo : "");
		self.cliente.cargar(data ? data.cliente : "");
	}

	self.limpiar = function(){
		self.id("");
		self.ubicacion("");
		self.calle("");
		self.nExt("");
		self.nInt("");
		self.cp("");
		self.colonia("");
		self.rec("");
		self.recDetalle("");
		self.ban("");
		self.banDetalle("");
		self.detalle("");
		self.construido("");
		self.Stotal("");
		self.costoM2("");
		self.Ctotal("");
		self.instPago("");
		self.propia("");
		self.adeudo("");
		self.fContrato("");
		self.fVigencia("");
		self.nCredito("");
		self.deseado("");
		self.comision(1);
		self.expediente("");
		self.num("");
		self.estatus("");
		self.operacion.limpiar();
		self.tipo.limpiar();
		self.cliente.limpiar();
	}
}