<?php
	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();
	if (!isset($correo) || $estatus != 3) {
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Inversión tu casa | Asesor</title>
		<?php
			include 'decorador.html';
		?>
	</head>
	<body>

	<?php
		include 'header.html';
	?>
		<div class="wrapper container">
			<section>
				<h4>Propuestas recientes</h4>
				<div class="table-wrapper">
					<table>
						<thead>
							<th>Cliente</th>
							<th>Teléfono</th>
							<th>Correo</th>
							<th>Modificar</th>
							<th>Activar</th>
						</thead>
						<tbody data-bind="foreach: propuestas">
							<tr>
								<td><span class="icon fa-user"></span> <span data-bind="text: cliente.usuario.nombre()"></span></td>
								<td><span class="icon fa-phone"></span> <span data-bind="text: cliente.telefono()"></span></td>
								<td><span class="icon fa-envelope"></span> <span data-bind="text: cliente.usuario.correo()"></span></td>
								<td><a data-bind="attr: {href: 'newInmueble.php?id=' + id()}"><span class="icon fa-edit"></span> Editar</a></td>
								<td><a data-bind="attr: {href: '../backend/common/activarInmueble.php?id=' + expediente()}"><span class="icon fa-check"></span> Activar</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
			<hr>
			<section>
				<h4>Inmuebles</h4>
				<p>
					<a href="newInmueble.php"><span class="icon fa-plus-circle"></span> Nuevo inmueble</a>
				</p>
				<div class="table-wrapper">
					<table>
						<thead>
							<th>Cliente</th>
							<th>Teléfono</th>
							<th>Correo</th>
							<th>Detalles</th>
							<th>Modificar</th>
						</thead>
						<tbody data-bind="foreach: inmuebles">
							<tr>
								<td><span class="icon fa-user"></span> <span data-bind="text: cliente.usuario.nombre()"></span></td>
								<td><span class="icon fa-phone"></span> <span data-bind="text: cliente.telefono()"></span></td>
								<td><span class="icon fa-envelope"></span> <span data-bind="text: cliente.usuario.correo()"></span></td>
								<td><a data-bind="attr: {href: 'detInmueble.php?id=' + id()}"><span class="icon fa-info"></span> Ver</a></td>
								<td><a data-bind="attr: {href: 'newInmueble.php?id=' + id()}"><span class="icon fa-edit"></span> Editar</a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</section>
		</div>

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
				ko.applyBindings(new ControllerAsesor());
			</script>
	</body>
</html>