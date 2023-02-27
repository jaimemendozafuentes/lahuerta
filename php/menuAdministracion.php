<?php 

	header('Content-Type: text/html; charset=utf-8');
	session_start();

	if (isset($_POST['salir'])) {
		unset($_SESSION['login']);

		header("location:../acceso_socios.php");
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>menuAdministración</title>
 	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
 	<link rel="stylesheet" href="../css/estilos_menuAdmin.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="../js/evaluarSolicitud.js"></script>
 </head>
 <body>
 	<header>
 		<h2>ADMINISTRACIÓN DE LA HUERTA GASTROCLUB</h2>
 	</header>
 	<div id="wrapper">
 		<div id="menu-nav">
 			<h3>MENÚ ADMIN</h3>
 			<nav>
 				<ul>
 					<li id='socios'><span>Socios</span></li>
 					<li id='solicitudes'><span>Solicitudes</span></li>
 				</ul>
 			</nav>
 		</div>
 		<div id="contenido">
 			<div id="veo">
				<div id="inputs">
					<form action="#" method='post' id='formulario'>
						<h3>SOLICITUD SOCIO</h3>
						<div class="paginas"></div>
 						<fieldset>
							<legend>Datos personales</legend>
							<input type="hidden" id='oculto'>
							<div class="pruebas">
								<div class="trato">
			 						<label id='trat'>Tratamiento</label>
			 						<input type="text" id='tratamiento'>
			 					</div>
								<div class="campos-inputs">
			 						<label>Apellidos</label>
			 						<input type="text" id='apellidos'>
			 					</div>
			 					<div class="campos-inputs">
			 						<label>Nombre</label>
			 						<input type="text" id='nombre'>
			 					</div>
			 					<div class="campos-inputs">	
			 						<label>Fecha de nacimiento</label>
			 						<input type="text" id='fecha'>
			 					</div>
			 					<div class="campos-inputs">	
			 						<label>Nacionalidad</label>
			 						<input type="text" id='nacionalidad'>
			 					</div>
			 					<div class="campos-inputs">	
			 						<label>DNI/PASAPORTE</label>
			 						<input type='text' name="tipodocumento" id="tipodocumento">
									<input type="text" id='numerodocumento'>
									</div>
								</div>	
							</fieldset>
							<fieldset>
								<legend>Dirección</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Nombre empresa</label>
					 						<input type="text" id='empresa'>
				 						</div>
					 					<div class="campos-inputs">
					 						<label>Domicilio</label>
					 						<input type="text" id='domicilio'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>Ciudad</label>
					 						<input type="text" id='ciudad'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>Código postal</label>
					 						<input type="text" id='cp'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>País</label>
					 						<input type="text" id='pais'>
					 					</div>
									</div>
							</fieldset>
							<fieldset>
								<legend>Datos de contacto</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Correo electrónico</label>
					 						<input type="email" id='correo'>
				 						</div>
					 					<div class="campos-inputs">
					 						<label>Teléfono móvil</label>
					 						<input type="text" id='tel1'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>Otro teléfono</label>
					 						<input type="text" id='tel2'>
					 					</div>
									</div>
							</fieldset>
							<fieldset>
								<legend>Datos de acceso</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Usuario</label>
					 						<input type="text" id='user'>
				 						</div>
					 					<div class="campos-inputs">
					 						<label>Contraseña</label>
					 						<input type="password" id='password'>
					 					</div>
									</div>
							</fieldset>
							<fieldset>
								<legend>Recomendado por</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Recomendado</label>
					 						<input type="text" id='rec'>
				 						</div>
				 						<div class="campos-inputs">
					 						<label>Fecha solicitud</label>
					 						<input type="text" id='fechasolicitud'>
				 						</div>
									</div>
							</fieldset>
							<div class="paginas"></div>
							<div id="aprobacion">
								
								<img id='deniega' src="../img/denied.png" alt="">
								<img id='acepta' src="../img/accept2.png" alt="">
							</div>
	 				</form>	
 				</div>
 			</div>
	
 		</div>
 	</div>
 	<form action="#" method='post'>
 		<input type="submit" value='Salir' name='salir' id='salir'>
 	</form>
 </body>
 </html>