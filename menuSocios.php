<?php 
	
	include("multiIdioma.php");
	require 'php/conexion_lahuerta.php';

	header('Content-Type: text/html; charset=utf-8');
	//session_start();

	if (!isset($_SESSION['loginUser'])) {
		header("location:acceso_socios.php");
	}

	if (isset($_POST['salir'])) {
		unset($_SESSION['loginUser']);

		header("location:acceso_socios.php");
	}
 ?>

<!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
 	<link rel="stylesheet" href="css/estilos_cabeceras.css">
 	<link rel="stylesheet" href="css/estilos_footer.css">
 	<link rel="stylesheet" href="css/estilos_menuSocio.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="js/pantalla_comprar.js"></script>
 </head>
 <body>
 	<?php include('comunes/header.html');?>
 	<div id="contenido-menu-socio">
 		<div id="titular-socio">
 			<h3>Hola <?=$_SESSION['loginUser']?>&nbsp;&nbsp;</h3>
 			<p><?php $fechaactual = getdate();
				echo "$fechaactual[weekday], $fechaactual[mday] de $fechaactual[month] de $fechaactual[year]";?>&nbsp;&nbsp;&nbsp;&nbsp;</p>
 			<form action="#" method='post' id='salirSocio'>
 				<input type="submit" value='Salir' name='salir' id='salir'>
 			</form>
 		</div>
 		<div id="amount">
 			<img src="img/carrito_naranja.png" alt="">
 			<span id='cuenta'>Total <span id='cuentaTotal'></span></span>
 		</div>
 		<div id="titulo-venta">
 			<h3>Venta de los productos de La Huerta</h3>
 		</div>
 		<div class="titulo-destacados">
 			<h3>Productos destacados</h3>
 		</div>
 		<div id="productos-destacados">
 			
 		</div>
 		<div id="envio-gratis">
 			<img src="img/envio_gratis.png" alt="">
 		</div>
 		<div id="titulo-todos">
 			<h3>Seleccione Categoría</h3>
 		</div>
 		<div id="todos-productos"></div>
 		<div id="mostrar-todos">
 			
 		</div>
 		<div id="paginas"></div>
 	
 	</div>
 	<?php include('comunes/footer.html');?>
 </body>
 </html> 