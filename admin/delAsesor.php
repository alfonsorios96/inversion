<?php
	session_start();
	$correo = $_SESSION['correo'];
	$estatus = $_SESSION['estatus'];
	session_write_close();
	
	if (!isset($correo) || $estatus != 1) {
		header("Location: ../index.php");
	}
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}else{
		$id = 0;
	}
?>
<html lang="es">
<head>
	<title></title>
</head>
<body>
	<?php
		include 'decorador.html';
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
	<script src="../frontend/knockout-min.js"></script>
	<script src="../frontend/model.js"></script>
	<script src="../frontend/controller.js"></script>
	<script>
		ko.applyBindings(new ControllerEliminarAsesor(<?=$id?>));
	</script>
</body>
</html>