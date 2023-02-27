<?php
	$conexionHuerta = mysqli_connect('localhost', 'root', '', 'lahuerta')
	or die("hubo un error al conectar con la base de datos");
	mysqli_set_charset($conexionHuerta, "utf8");
?>