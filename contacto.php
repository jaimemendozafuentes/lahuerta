<?php 
	include("multiIdioma.php");
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title><?=strtoupper($conFormu)?> | LaHuertaGastroclub</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
 	<link rel="stylesheet" href="css/estilos_cabeceras.css">
 	<link rel="stylesheet" href="css/estilos_footer.css">
 	<link rel="stylesheet" href="css/estilos_contacto.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src='js/formulario_contacto.js'></script>
</head>
<body>
	<?php include("comunes/header.html") ?>
	<div id="cos">
		<div id="info-contacto">
			<h1><?=$conFormu?></h1>
			<h3><?=$informacionContacto?></h3>
		</div>
		<div id="contingut">
			<div id="ubicacion">
				<div id="plano-huerta">
					<img src="img/plano_huerta.png" alt="">
				</div>
				<div id="direccion">
					<p>Plaza de Lesseps 17</p>
					<p>08012 Barcelona</p>
					<p>+34 626 87 95 22</p>
				</div>
				
			</div>
			<div id="formulario-contacto">
				
					<div id="formulario-datos">
						<form action="#" method='post' id='contacto'>
							<label><?=$nomComplet?></label>
							<input type="text" id='nombreCompleto' class='inputs'><br>
							<label>Email</label>
							<input type="email" id='email' class='inputs'><br>
							<label><?=$asunt?></label>
							<input type="text" id='asunto' class='inputs'><br>
							<label><?=$mensa?></label>
							<textarea name="cuerpoMensaje" id="cuerpoMensaje" cols="30" rows="10"></textarea><br><br>
							<input type="button" value="<?=$envioFormu?>" id="enviarComentario">
						</form>
					</div>
			</div>
			
		</div>
	</div>
	<?php include ('comunes/footer.html') ?>
	
</body>
</html>