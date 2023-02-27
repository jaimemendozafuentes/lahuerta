<?php 

	session_start();

	if (!isset($_SESSION['loginAdmin'])) {
		header("location:../acceso_socios.php");
	}
	
	require "conexion_lahuerta.php";

	$id =$_POST['id'];

	$sql = "DELETE FROM solicitud_socios WHERE idsolicitud=$id";
	mysqli_query($conexionHuerta, $sql)or die(mysqli_error($conexionHuerta));

	echo "Petición de socio rechazada";

 ?>