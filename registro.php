<!DOCTYPE html>
<html>
	<head>
		<title>Inversión tu casa | Registro</title>
		<?php
			include 'decorador.html';
		?>
	</head>
	<body>

	<?php
		include 'header2.html';
	?>
		<!-- Two -->
			<section id="two" class="wrapper content-mad">
				<div class="inner"><br><br>
						<form method="post" action="#">
							<div class="row uniform">
								<div class="wow bounceInDown 12u$">
									<h2>Acerca de usted...</h2>
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
								<div class="wow bounceInRight 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Teléfono de contacto</label>
									<input type="text" placeholder="Ej. (55) 12345678" data-bind="value: inmueble.cliente.telefono"/>
									<p class="error" data-bind="text: error.cliente.telefono()"></p>
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
									<h2>Acerca de su propiedad...</h2>
								</div>
								<div class="wow bounceInLeft 12u$">
									<label>Ubicación</label>
									<input type="text" id="pac-input-2" placeholder="Ej. Manzana 3 Col. Benito Juárez" data-bind="value: inmueble.ubicacion"/>
									<p class="error" data-bind="text: error.ubicacion()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u(large) 6u(medium) 6u(xsmall)">
									<label>Calle</label>
									<input type="text"  placeholder="Ej. Donceles" data-bind="value: inmueble.calle"/>
									<p class="error" data-bind="text: error.calle()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u$(large) 6u(medium) 6u$(xsmall)">
									<label>Número ext.</label>
									<input type="text"  placeholder="Ej. 1234" data-bind="value: inmueble.nExt"/>
									<p class="error" data-bind="text: error.nExt()"></p>
								</div>
								<div class="wow bounceInLeft 3u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Colonia</label>
									<input type="text"  placeholder="Ej. Santa María la Ribera" data-bind="value: inmueble.colonia"/>
									<p class="error" data-bind="text: error.colonia()"></p>
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
									<label># Recámaras</label>
									<input type="number" min="0" placeholder="Ej. 4" data-bind="value: inmueble.rec"/>
									<p class="error" data-bind="text: error.rec()"></p>
								</div>
								<div class="wow bounceInLeft 3u 6u$(large) 6u(medium) 6u$(xsmall)">
									<label># Baños</label>
									<input type="number" min="0" placeholder="Ej. 2" data-bind="value: inmueble.ban"/>
									<p class="error" data-bind="text: error.ban()"></p>
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
								<div class="wow bounceInLeft 12u$">
									<label for="message">Detalles de la propiedad</label>
									<textarea rows="5" data-bind="value: inmueble.detalle"></textarea>
									<p class="error" data-bind="text: error.detalle()"></p>
								</div>
								<div class="wow bounceInLeft 12u$">
									<ul class="actions">
										<li>
											<a href="#" class="button" data-bind="click: registrar">Solicitar asesor</a>
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
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>
			<script src="assets/js/wow.min.js"></script>
			<script>
			 	new WOW().init();
			</script>
			<script src="assets/js/toastr.js"></script>
			<script src="assets/js/ui-toastr.js"></script>
			<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
			<script src="frontend/knockout-min.js"></script>
			<script src="frontend/model.js"></script>
			<script src="frontend/controller.js"></script>
			<script>
				ko.applyBindings(new ControllerPropuesta());
			</script>
	</body>
</html>