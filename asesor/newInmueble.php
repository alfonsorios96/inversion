<?php
	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();
	if (!isset($correo) || ($estatus != 1 && $estatus != 3)) {
		header("Location: ../index.php");
	}
	$id = 0;
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inversión tu casa | Inmueble</title>
		<?php
			include 'decorador.html';
		?>
	</head>
	<body>

	<?php
		include 'header.html';
	?>
		<!-- Two -->
			<section id="two" class="wrapper content-mad">
				<div class="inner"><br><br>
						<form method="post" action="#">
							<div class="row uniform">
								<div class="wow bounceInDown 12u$">
									<h2>Datos del cliente</h2>
								</div>
								<div class="wow bounceInLeft 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Nombre</label>
									<input type="text" placeholder="Ej. Juan Pérez" data-bind="value: inmueble.cliente.usuario.nombre"/>
									<p class="error" data-bind="text: error.cliente.usuario.nombre()"></p>
								</div>
								<div class="wow bounceInRight 6u$ 12u$(large) 6u$(medium) 12u$(xsmall)">
									<label>Correo electrónico</label>
									<input type="email" placeholder="Ej. jperez@correo.com" data-bind="value: inmueble.cliente.usuario.correo"/>
									<p class="error" data-bind="text: error.cliente.usuario.correo()"></p>
								</div>
								<div class="wow bounceInLeft 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Domicilio</label>
									<input type="text" id="pac-input-1" placeholder="Ej. Manzana 3 Col. Benito Juárez" data-bind="value: inmueble.cliente.domicilio"/>
									<p class="error" data-bind="text: error.cliente.domicilio()"></p>
								</div>
								<div class="wow bounceInRight 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Teléfono</label>
									<input type="text" placeholder="Ej. (55) 12345678" data-bind="value: inmueble.cliente.telefono"/>
									<p class="error" data-bind="text: error.cliente.telefono()"></p>
								</div>
								<div class="wow bounceInRight 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Otro contacto</label>
									<input type="text" placeholder="Ej. Hermana Ana : (55) 12345678" data-bind="value: inmueble.cliente.contacto"/>
									<p class="error" data-bind="text: error.cliente.contacto()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>CURP</label>
									<input type="text" placeholder="Ej. RIMA720902MDFABC01" data-bind="value: inmueble.cliente.curp"/>
									<p class="error" data-bind="text: error.cliente.curp()"></p>
								</div>
								<div class="wow bounceInRight 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>N.S.S.</label>
									<input type="text" placeholder="Ej. 1234567890" data-bind="value: inmueble.cliente.nss"/>
									<p class="error" data-bind="text: error.cliente.nss()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u(large) 6u(medium) 12u(xsmall)">
									<label>Estado civil</label>
									<div class="select-wrapper">
										<select data-bind="value : inmueble.cliente.civil">
											<option value="Soltero">Soltero</option>
											<option value="Casado">Casado</option>
											<option value="Divorciado">Divorciado</option>
											<option value="Viudo">Viudo</option>
										</select>
									</div>
									<p class="error" data-bind="text: error.cliente.civil()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u(large) 6u(medium) 12u(xsmall)">
									<label>Lugar de nacimiento</label>
									<div class="select-wrapper">
										<select id="estado" data-bind="options : estados,
		                                   optionsText: 'estado',
		                                   optionsValue: 'id',
		                                   optionsCaption: 'Lugar de nacimiento',
		                                   value : inmueble.cliente.estado.id">
										</select>
									</div>
									<p class="error" data-bind="text: error.cliente.estado.estado()"></p>
								</div>
								<div class="wow bounceInLeft 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Clave de acceso</label>
									<input type="password" placeholder="Ej. a1c0f3" data-bind="value: clave1"/>
									<p class="error" data-bind="text: error.cliente.usuario.clave()"></p>
								</div>
								<div class="wow bounceInRight 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Confirmar clave</label>
									<input type="password" placeholder="Ej. a1c0f3" data-bind="value: clave2"/>
								</div>
								<hr>
								<div class="wow bounceInLeft 12u$">
									<h2>Datos de la propiedad...</h2>
								</div>
								<div class="wow bounceInLeft 6u 12u(large) 12u(medium) 12u(xsmall)">
									<label>Ubicación</label>
									<input type="text" id="pac-input-2" placeholder="Ej. Manzana 3 Col. Benito Juárez" data-bind="value: inmueble.ubicacion"/>
									<p class="error" data-bind="text: error.ubicacion()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u(large) 6u(medium) 12u(xsmall)">
									<label>Expediente</label>
									<input type="text" placeholder="Ej. 123" data-bind="value: inmueble.num"/>
								</div>
								<div class="wow bounceInLeft 3u 12u(large) 12u(medium) 12u(xsmall)">
									<label>Tipo de propiedad</label>
									<div class="select-wrapper">
										<select id="tipo" data-bind="options : tipos,
		                                   optionsText: 'tipo',
		                                   optionsValue: 'id',
		                                   optionsCaption: 'Tipo de Inmueble',
		                                   value : inmueble.tipo.id">
										</select>
									</div>
									<p class="error" data-bind="text: error.tipo.tipo()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u(large) 6u(medium) 6u(xsmall)">
									<label>Calle</label>
									<input type="text"  placeholder="Ej. Donceles" data-bind="value: inmueble.calle"/>
									<p class="error" data-bind="text: error.calle()"></p>
								</div>
								<div class="wow bounceInLeft 2u 6u$(large) 3u(medium) 6u$(xsmall)">
									<label>Número ext.</label>
									<input type="text"  placeholder="Ej. 1234" data-bind="value: inmueble.nExt"/>
									<p class="error" data-bind="text: error.nExt()"></p>
								</div>
								<div class="wow bounceInLeft 1u 6u$(large) 3u(medium) 6u$(xsmall)">
									<label>Interior</label>
									<input type="text"  placeholder="Ej. 2-BIS" data-bind="value: inmueble.nInt"/>
									<p class="error" data-bind="text: error.nInt()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Colonia</label>
									<input type="text"  placeholder="Ej. Santa María la Ribera" data-bind="value: inmueble.colonia"/>
									<p class="error" data-bind="text: error.colonia()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>C.P.</label>
									<input type="text"  placeholder="Ej. 57000" data-bind="value: inmueble.cp"/>
									<p class="error" data-bind="text: error.cp()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u(large) 6u(medium) 6u(xsmall)">
									<label># Recámaras</label>
									<input type="number" min="0" placeholder="Ej. 4" data-bind="value: inmueble.rec"/>
									<p class="error" data-bind="text: error.rec()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u(large) 6u(medium) 6u(xsmall)">
									<label>Detalles (Recámaras)</label>
									<input type="text" placeholder="Ej. Paredes dañadas" data-bind="value: inmueble.recDetalle"/>
									<p class="error" data-bind="text: error.recDetalle()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u$(large) 6u(medium) 6u$(xsmall)">
									<label># Baños</label>
									<input type="number" min="0" placeholder="Ej. 2" data-bind="value: inmueble.ban"/>
									<p class="error" data-bind="text: error.ban()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u(large) 6u(medium) 6u(xsmall)">
									<label>Detalles (Baños)</label>
									<input type="text" placeholder="Ej. Azulejo nuevo" data-bind="value: inmueble.banDetalle"/>
									<p class="error" data-bind="text: error.banDetalle()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>¿Cuánto desea obtener?</label>
									<input type="text"  placeholder="Ej. 1200000" data-bind="value: inmueble.deseado"/>
									<p class="error" data-bind="text: error.deseado()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>¿Aún adeuda la propiedad?</label>
									<div class="select-wrapper">
										<select data-bind="value: inmueble.propia">
											<option value="0">No</option>
											<option value="1">Sí</option>
										</select>
									</div>
									<p class="error" data-bind="text: error.propia()"></p>
								</div>
								<div class="wow bounceInLeft 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Deuda de la casa</label>
									<input type="text"  placeholder="Ej. Se deben $200,000 MXN con mensualidades de $2,000" data-bind="value: inmueble.adeudo"/>
									<p class="error" data-bind="text: error.adeudo()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Superficie construida (m<sup>2</sup>)</label>
									<input type="text"  placeholder="Ej. 750" data-bind="value: inmueble.construido"/>
									<p class="error" data-bind="text: error.construido()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Superficie total (m<sup>2</sup>)</label>
									<input type="text"  placeholder="Ej. 1000" data-bind="value: inmueble.Stotal"/>
									<p class="error" data-bind="text: error.Stotal()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Costo por (m<sup>2</sup>)</label>
									<input type="text"  placeholder="Ej. 120" data-bind="value: inmueble.costoM2"/>
									<p class="error" data-bind="text: error.costoM2()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Costo total</label>
									<input type="text"  placeholder="Ej. 1200000" data-bind="value: inmueble.Ctotal"/>
									<p class="error" data-bind="text: error.Ctotal()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Institución de pago</label>
									<input type="text"  placeholder="Ej. INFONAVIT" data-bind="value: inmueble.instPago"/>
									<p class="error" data-bind="text: error.instPago()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Número de crédito</label>
									<input type="text"  placeholder="Ej. 2353823" data-bind="value: inmueble.nCredito"/>
									<p class="error" data-bind="text: error.nCredito()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Fecha de contrato</label>
									<input type="date"  placeholder="Ej. 12/08/15" data-bind="value: inmueble.fContrato"/>
									<p class="error" data-bind="text: error.fContrato()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Fecha de vigencia</label>
									<input type="date"  placeholder="Ej. 12/10/15" data-bind="value: inmueble.fVigencia"/>
									<p class="error" data-bind="text: error.fVigencia()"></p>
								</div>
								<div class="wow bounceInLeft 12u$">
									<label for="message">Detalles de la propiedad</label>
									<textarea rows="5" data-bind="value: inmueble.detalle"></textarea>
									<p class="error" data-bind="text: error.detalle()"></p>
								</div>
								<div class="wow bounceInLeft 12u$">
									<ul class="actions">
										<li>
											<a href="#" class="button" data-bind="click: registrar">Guardar inmueble</a>
										</li>
									</ul>
								</div>
							</div>
						</form>
				</div>
			</section>

		<?php
			include 'footer.html';
		?>

		<!-- Scripts -->
			<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/js/jquery.dropotron.min.js"></script>
			<script src="../assets/js/jquery.scrollex.min.js"></script>
			<script src="../assets/js/skel.min.js"></script>
			<script src="../assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="../assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="../assets/js/main.js"></script>
			<script src="../assets/js/wow.min.js"></script>
			<script>
			 	new WOW().init();
			</script>
			<script src="../assets/js/toastr.js"></script>
			<script src="../assets/js/ui-toastr.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
			<script src="../frontend/knockout-min.js"></script>
			<script src="../frontend/model.js"></script>
			<script src="../frontend/controller.js"></script>
			<script>
				ko.applyBindings(new ControllerRegistrarInmueble(<?=$id?>));
			</script>
	</body>
</html>