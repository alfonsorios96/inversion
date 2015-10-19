<?php
	require_once 'backend/model/Conexion.php';

	if($_POST['query']){
		$data = $_POST['query'];
		$conexion = new Conexion();
		$consulta = $conexion->prepare($data);
		$consulta->execute();
		echo "Query cargada correctamente !! :D";
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Querys</title>
</head>
<body>
	<form action="query.php" method="post">
		<textarea name="query" id="query" cols="30" rows="10">
			
		</textarea>
		<input type="submit" value="Ejecutar">
	</form>
</body>
</html>