<?php
	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();
	if (!isset($correo) || $estatus != 1) {
		header("Location: ../index.php");
	}
	$id = 0;
	$msj = 'Nuevo';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$msj = 'Modificar';
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inversión tu casa | Administrador</title>
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
									<h2><?=$msj?> asesor</h2>
								</div>
								<div class="wow bounceInLeft 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Nombre</label>
									<input type="text" placeholder="Ej. Juan Pérez" data-bind="value: asesor.usuario.nombre"/>
									<p class="error" data-bind="text: error.usuario.nombre()"></p>
								</div>
								<div class="wow bounceInRight 6u$ 12u$(large) 6u$(medium) 12u$(xsmall)">
									<label>Correo electrónico</label>
									<input type="email" placeholder="Ej. jperez@correo.com" data-bind="value: asesor.usuario.correo"/>
									<p class="error" data-bind="text: error.usuario.correo()"></p>
								</div>
								<div class="wow bounceInRight 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Teléfono</label>
									<input type="text" placeholder="Ej. (55) 12345678" data-bind="value: asesor.telefono"/>
									<p class="error" data-bind="text: error.telefono()"></p>
								</div>
								<div class="wow bounceInLeft 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Clave de acceso</label>
									<input type="password" placeholder="Ej. a1c0f3" data-bind="value: clave1"/>
									<p class="error" data-bind="text: error.usuario.clave()"></p>
								</div>
								<div class="wow bounceInRight 6u 12u$(large) 6u(medium) 12u$(xsmall)">
									<label>Confirmar clave</label>
									<input type="password" placeholder="Ej. a1c0f3" data-bind="value: clave2"/>
								</div>
								<div class="wow bounceInLeft 6u 12u(large) 12u(medium) 12u(xsmall)">
									<label>Referido a</label>
									<div class="select-wrapper">
										<select id="sede" data-bind="options : sedes,
		                                   optionsText: 'sede',
		                                   optionsValue: 'id',
		                                   optionsCaption: 'Seleccione la sucursal',
		                                   value : asesor.sede.id">
										</select>
									</div>
									<p class="error" data-bind="text: error.sede.sede()"></p>
								</div>
								<div class="wow bounceInLeft 12u$">
									<ul class="actions">
										<li>
											<a href="#" class="button" data-bind="click: registrar">Guardar asesor</a>
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
				ko.applyBindings(new ControllerRegistrarAsesor(<?=$id?>));
			</script>
	</body>
</html>