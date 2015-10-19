<?php
	session_start();
	session_unset($_SESSION['correo']);
	session_unset($_SESSION['estatus']);
	session_write_close();
	header("Location: ../../login.php");
?>