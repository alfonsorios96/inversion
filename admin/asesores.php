<?php
	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();
	if (!isset($correo) || $estatus != 1) {
		header("Location: ../index.php");
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
		<div class="wrapper container">
			<section>
				<h4>Asesores</h4>
				<p>
					<a href="newAsesor.php"><span class="icon fa-plus-circle"></span> Nuevo asesor</a>
				</p>
				<div class="table-wrapper">
					<table>
						<thead>
							<th>Nombre</th>
							<th>Correo</th>
							<th>Sucursal</th>
							<th>Modificar</th>
							<th>Borrar</th>
						</thead>
						<tbody data-bind="foreach: asesores">
							<tr>
								<td><span class="icon fa-user"></span> <span data-bind="text: usuario.nombre()"></span></td>
								<td><span class="icon fa-envelope"></span> <span data-bind="text: usuario.correo()"></span></td>
								<td><span class="icon fa-map-marker"></span> <span data-bind="text: sede.sede()"></span></td>
								<td><a data-bind="attr: {href: 'newAsesor.php?id=' + id()}"><span class="icon fa-pencil-square-o"></span> Editar</a></td>
								<td><a data-bind="attr: {href: 'delAsesor.php?id=' + usuario.id()}"><span class="icon fa-minus-circle"></span> Borrar</a></td>
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
				ko.applyBindings(new ControllerAdmin());
			</script>
	</body>
</html>