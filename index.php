<!DOCTYPE HTML>
<!--
	Slate by Pixelarity
	pixelarity.com @pixelarity
	License: pixelarity.com/license
-->
<html lang="es">
	<head>
		<title>Inversión tu casa | Bienvenido</title>
		<?php
			include 'decorador.html';
		?>
		<style>
			.google-maps {
				position: relative;
				padding-bottom: 75%; // This is the aspect ratio
				height: 0;
				overflow: hidden;
			}
			.google-maps iframe {
				position: absolute;
				top: 0;
				left: 0;
				width: 100% !important;
				height: 100% !important;
			}
		</style>
	</head>
	<body>

		<?php
			include 'header.html';
		?>

		<!-- Banner -->
			<section id="banner">
				<article>
					<img src="images/slide01.jpg" alt="Familia estrena casa" />
					<div class="inner">
						<h2>Estrena tu casa hoy</h2>
						<a href="catalogo.php" class="button special">Ver casas</a>
					</div>
				</article>
				<article>
					<img src="images/slide04.jpg"  alt="Inmobiliaria" />
					<div class="inner">
						<h2>Si aún adeudas tu casa, no la dejes perder</h2>
						<h4>Nosotros te ayudamos a venderla</h4>
					</div>
				</article>
				<article>
					<img src="images/slide02.jpg" alt="Asesor inmobiliario" />
					<div class="inner">
						<h2>Asesoría inmobiliaria ¡sin costo!</h2>
					</div>
				</article>
				<article>
					<img src="images/slide03.jpg"  alt="Inmobiliaria" />
					<div class="inner">
						<h2>¿Deseas comprar tu casa?</h2>
						<h4>Bienvenidos todos los créditos</h4>
						<!-- Tramitamos tu crédito ... (logos)-->
						<!-- Mostrar los iconos de los creditos disponibles Infonavit, Foviste, Banjercito. Isfam, IMMS -->
					</div>
				</article>
			</section>

		<!-- Three -->
			<section id="three" class="wrapper style2">
				<div class="inner">
					<h2>Casas, departamentos y terrenos más recientes</h2>
					<a href="catalogo.php" class="button">Ver todo</a><br><br><hr>
					<div class="posts" data-bind="foreach: inmuebles">
						<section class="post">
							<span class="image"><img data-bind="attr: {src: 'images/inmuebles/' + expediente() + '/medium/' + pic()}" /></span>
							<div class="content">
								<h3 data-bind="text: tipo.tipo() + ' - ' + operacion.operacion() + ' | en colonia ' + colonia()"></h3>
								<ul class="alt">
									<li><i class="fa fa-home"></i> <span data-bind="text: 'Pregunta por la propiedad : ' + num()"></span></li>
									<li><i class="fa fa-bed"></i> <span data-bind="text: rec()"></span> amplias y <span data-bind="text: ban()"></span> <span data-bind="text: ban() == 1 ? 'baño' : 'baños'"></span></li>
									<li><i class="fa fa-shopping-cart"></i> <span data-bind="text: detalle()"></span></li>
									<li><i class="fa fa-usd"></i> <span data-bind="text: deseado()"></span> MXN</li>
								</ul>
								<ul class="actions">
									<li><a href="#" class="button">Detalles</a></li>
								</ul>
							</div>
						</section>
					</div>
				</div>
			</section>

		<!-- Contact -->
			<section id="contact" class="wrapper split">
				<div class="inner">
					<section>
						<div class="google-maps">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3765.2731031557314!2d-98.928912!3d19.313952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce1dd9e1dc7499%3A0xdaebad5e53baa214!2sInversi%C3%B3n+tu+Casa!5e0!3m2!1ses!2s!4v1433136191607" width="600" height="450" frameborder="0" style="border:0"></iframe>
						</div>
					</section>
					<section>
						<h2>Localízanos en el mapa</h2>
						<ul class="bulleted-icons">
							<li>
								<span class="icon-wrapper"><span class="icon fa-phone"></span></span>
								<h3>Teléfono</h3>
								<p>
									Oficina 59 428 769 <br>
									Oficina 47 803 991<br>
									Nextel	49891859
								</p>
							</li>
							<li>
								<span class="icon-wrapper"><span class="icon fa-envelope"></span></span>
								<h3>Correo electrónico</h3>
								<p><a href="#">contacto@inversiontucasa.com.mx</a></p>
							</li>
							<li>
								<span class="icon-wrapper"><span class="icon fa-home"></span></span>
								<h3>Ubicación geográfica</h3>
								<p>
									Av. Cuauhtémoc No. 24 , Ayotla, Edo. de México
								</p>
							</li>
						</ul>
					</section>
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
			<script src="frontend/knockout-min.js"></script>
			<script src="frontend/model.js"></script>
			<script src="frontend/controller.js"></script>
			<script src="assets/js/typeahead.js"></script>
			<script>
				ko.applyBindings(new ControllerMain());
			</script>
	</body>
</html>