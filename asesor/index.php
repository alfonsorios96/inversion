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
		<section class="wrapper style3 special">
			<div class="inner">
				<h2>Hello world!</h2>
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
				ko.applyBindings(new ControllerAsesor());
			</script>
	</body>
</html>