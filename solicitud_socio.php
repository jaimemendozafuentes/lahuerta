<?php 
	include("multiIdioma.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$tituloHazteSocio?> | LaHuertaGastroclub</title>
	<link rel="stylesheet" href="css/estilos_hazte_socio.css">
	<link rel="stylesheet" href="css/estilos_footer.css">
	<link rel="stylesheet" href="css/estilos_cabeceras.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
	<style>
		
	</style>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='js/solicitud_socio.js'></script>
</head>
<body>
	<?php include('comunes/header.html'); 
	?>
	<div id="wrappero">
		<div id="formulario-solicitud">
			<div id="hazte-socio">
				<h1><?=$tituloHazteSocio?></h1>
			</div>
			<br>
			<br>
			<div id="informacion">
				<h1 class='naranja'><?=$tituloHazteSocio?></h1><br>
				<p><?=$informacion?></p>
			</div>
			<form action="#" method='post' id='formulario'>
				<div class='apartados'>
					<h1 class='naranja'><?=$datosPersonales?></h1><br>
					<input type="radio" name='diri' id='sr' value='Sr.' checked><span class='dear'>Sr.</span>
					<input type="radio" name='diri' id='sra' value='Sra.'><span class='dear'>Sra.</span>
					<input type="radio" name='diri' id='srta' value='Srta.'><span class='dear'>Srta.</span><br><br>
					<label><?=$apellidos?><span class='rojo'>*</span></label>
					<input type="text" class='texto'id='apellidos' placeholder="<?=$introApellidos?>">
					<label><?=$nombre?><span class='rojo'>*</span></label>
					<input type="text" class='texto'id='nombre' placeholder="<?=$introNombre?>">
					<label><?=$fechaNaci?><span class='rojo'>*<span></label>
					<input type="date" id='fecha'>
					<label><?=$nacionalidad?><span class='rojo'>*</span></label>
					<input type="text" class='texto'id='nacionalidad' placeholder="<?=$introNaci?>">
					<label><?=$docu?><span class='rojo'>*</span></label>
					<select name="documento" id="documento">
						<option value="DNI">DNI</option>
						<option value="NIE">NIE</option>
						<option value="PASAPORTE"><?=$pasaporte?></option>
					</select>
					<input type="text" id='doc' placeholder="<?=$introDni?>"><br><br>
				</div>
				<div class="apartados">
					<h1 class='naranja'><?=$direccion?></h1><br><br><br>
					<label><?=$empresa?></label>
					<input type="text" class='texto' id='empresa' placeholder="<?=$introEmpresa?>">
					<label><?=$domicilio?><span class='rojo'>*</span></label>
					<input type="text" class='texto' id='domicilio' placeholder="<?=$introDomicilio?>">
					<label><?=$ciudad?><span class='rojo'>*</span></label>
					<input type="text" class='texto' id='ciudad' placeholder='<?=$introCiudad?>'>
					<label><?=$codigo?><span class='rojo'>*</span></label>
					<input type="text" class='texto' id='cp' placeholder='<?=$introCodigo?>'>
					<label><?=$pais?><span class="rojo">*</span></label>
					<input type="text" class='texto' id='pais' placeholder='<?=$introPais?>'><br><br>
				</div>
				<div class='apartados'>	
					<h1 class="naranja"><?=$datosContacto?></h1><br>
					<label><?=$correo?><span class="rojo">*</span></label>
					<input type="email" class='texto' id='email' placeholder="<?=$introCorreo?>">
					<label><?=$confirmCorreo?><span class="rojo">*</span></label>
					<input type="email" class='texto' id='emailconfirm' placeholder="<?=$introCorreo?>">
					<label><?=$telefonoMovil?><span class="rojo">*</span></label>
					<input type="text" class='texto' id='telefono' placeholder="<?=$introTel?>">
					<label><?=$otroTel?></label>
					<input type="text" class='texto' id='telopcional' placeholder="<?=$introOtroTel?>"><br><br>
				</div>
				<div id="regis">
					<div class="datos">
						<h1 class="naranja"><?=$datosAcceso?></h1><br>
						<label><?=$nombreUsuario?><span class='rojo'>*</span></label>
						<input type="text" id='introUser'class='texto' placeholder="<?=$introUsuario?>">
						<label><?=$contrasenya?><span class='rojo'>*</span></label>
						<input type="password" id='introPass'placeholder="<?=$introContrasenya?>">
					</div>
					<div class='datos'>	
						<h1 class="naranja"><?=$recomendado?></h1><br>
						<label><?=$aviso?></label>
						<input type="text" class='texto' id='recomendado' placeholder=<?=$introAviso?>
						<br>
						<br>
					</div>
				</div>	
				<div id="reglamento">
					<?php 
						$fichero=fopen("files/reglamentoHuerta_$idioma.txt", 'r');
						$long = filesize("files/reglamentoHuerta_$idioma.txt");
						$texto= fread($fichero,$long);
						echo $texto;
					 ?>
				</div>
				<div id="legal">
					<input type="checkbox" id='legal1'><span><?=$reglamento?><span class='rojo'>*</span><span>
				</div>
				<div id="boton">
					<input type="button" id='enviar' value="<?=$valorEnviar?>" disabled title="<?=$textoBoton?>">
				</div>
				

			</form>
		</div>
	</div>
	<?php include ('comunes/footer.html') ?>
</body>
</html>