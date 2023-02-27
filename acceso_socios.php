<?php 
	$fallo="";
	include("multiIdioma.php");
	require 'php/conexion_lahuerta.php';

	if (isset($_SESSION['loginAdmin'])) {
		header("location:menuAdministracion.php");
	}
	if (isset($_SESSION['loginUser'])) {
		header("location:menuSocios.php");
	}

	if (isset($_POST['registro-boton'])) {
		$usuario=$_POST['registro-usuario'];
		$password=$_POST['registro-password'];

		if (trim($usuario)=='' || trim($password)=='') {
			$fallo="INTRODUZCA USUARIO Y CONTRASEÑA";
		}else{
			$sql="SELECT usuario,password,tipousuario FROM socios WHERE usuario COLLATE utf8_bin='$usuario'";
			$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));

			$row=mysqli_fetch_assoc($result);

			//si el password recuperado coincide con el informado en el formulario enlzamos con la página de consulta de pacientes
			if (md5(sha1($password))==$row['password']) {

				if ($row['tipousuario']=='AD') {
					$_SESSION['loginAdmin']=$usuario;//Al acceder nos creamos una variable de sesion.
					header("location:menuAdministracion.php");

				}
				else{
					$_SESSION['loginUser']=$usuario;//Al acceder nos creamos una variable de sesion.
					header("location:menuSocios.php");
				}
				echo "$usuario";
				
			}
			//si no coincide mostramos un mensaje de nif o contraseña incorrectos
			else{
				 $fallo="NIF o CONTRASEÑA INCORRECTOS";
			}
		}
		
	}
	

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Acceso socios</title>
 	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
 	<link rel="stylesheet" href="css/estilos_cabeceras.css">
 	<link rel="stylesheet" href="css/estilos_footer.css">
 	<link rel="stylesheet" href="css/estilos_socios.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 </head>
 <body>
 	<?php include("comunes/header.html") ?>
 	<div id="contenido-socios">
 		<div id="titulo-socios">
 			<h4><?=$autent?></h4>
 		</div>
 		<div id="registro">
 			<div class="secciones" >
 				<div class="dentro-secciones">
 					<h2><?=$infoCuen?></h2>
 				<p><?=$infoUsuario?></p>
 				<span><?=$fallo?></span>
 				<form action="#" method='post' id='formu-registro'>
 					<label><?=$labelUsuario?></label>
 					<input type="text" id='registro-usuario' name='registro-usuario' autofocus>
 					<label><?=$labelContra?></label>
 					<input type="password" id='registro-password' name='registro-password'>
 					<input type="submit" value="<?=$botonInicio?>" id='registro-boton' name='registro-boton'>
 				</form>
 				</div>
 				
 			</div>
 			<div class="secciones"id='barra'>
 				<div class="dentro-secciones">
 					<h2><?=$infoNueva?></h2>
 				<p><?=$infoCuenta?></p>
 				<a href="solicitud_socio.php"><?=$crearCuenta?></a>
 				</div>
 				
 			</div>
 		</div>
 	</div>
 	<?php include ('comunes/footer.html') ?>
 </body>
 </html>