<!DOCTYPE html>
<html>
	<head>
		<title>Inversión tu casa | Inicio</title>
		<?php
			include 'decorador.html';
		?>
		<style>
			.login{
				margin: 0 auto;
			}
		</style>
	</head>
	<body>

	<?php
		include 'header2.html';
	?>
		<!-- Two -->
			<section class="wrapper login container">
				<div class="inner">
					<div class="major">
						<h2>Inicia sesión</h2>
					</div>
					<div class="row uniform">
						<div class="8u$">
							<span>Correo electrónico</span>
							<input type="text" placeholder="Ej. mracs@miempresa.com" data-bind="value: usuario.correo">
							<p class="error" data-bind="text: error.correo()"></p>
						</div>
					</div>
					<div class="row uniform">
						<div class="8u$">
							<span>Clave de acceso</span>
							<input type="password" placeholder="Ej. a1a2a3" data-bind="value: usuario.clave">
							<p class="error" data-bind="text: error.clave()"></p>
						</div>
					</div>
					<div class="row uniform">
						<div class="4u$">
							<a class="button fit" data-bind="click: iniciar">Iniciar</a>
						</div>
					</div>
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
			<script src="frontend/knockout-min.js"></script>
			<script src="frontend/model.js"></script>
			<script src="frontend/controller.js"></script>
			<script>
				ko.applyBindings(new ControllerLogin());
			</script>
	</body>
</html>