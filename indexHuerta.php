<?php 
	include("multiIdioma.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>HOME | LaHuertaGastroClub</title>
 	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
 	<link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
 	<link rel="stylesheet" href="css/estilos_cabeceras.css">
 	<link rel="stylesheet" href="css/estilos_footer.css">
 	<link rel="stylesheet" href="css/estilos_index.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="js/index_javascript.js"></script>

 </head>
 <body>
 	<?php include('comunes/header.html'); 
	?>
	<div id="contenido">
		<div id="slider">
			<img id='imagen2' src="" alt="">
			<img id='imagen1' src="" alt="">
		</div>
		<div id="cita">
			<h3><?=$cita?></h3>
		</div>
		<div id="imagenes-huerta">
			<h3 class='te'><?=$exte?></h3>
			<img src="img/huerta_exterior.jpg" alt="">
			<img src="img/huerta_exterior2.jpg" alt="">
			<h3 class='te'><?=$int?></h3>
			<img src="img/huerta_interior.jpg" alt="">
			<img src="img/huerta_interior2.jpg" alt="">
		</div>
		<div id="informacion-talleres">
			<div id="titulo-talleres">
				<h1><?=$titTaller?></h1>
				<h3><?=$barna?></h3><br><br>
				<p><?=$prime?></p><br>
				<p><?=$segu?></p><br>
				<p><?=$ter?></p><br>
				<p><?=$cuar?></p><br>
				<p><?=$cin?></p>
				<div id="imagenes-taller">
					<img src="img/curso1.jpg" alt="">
				</div>
			</div>
		</div>
		<div id="nosotros">
			<div id="titulo-nosotros">
				<?php 
		    	readfile("files/sobre_nosotros_titulo_$idioma.txt"); 
		    	?>
			</div>	
		</div>
	</div>
	<?php include('comunes/footer.html') ?>
	
 </body>
 </html>