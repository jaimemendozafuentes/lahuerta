<?php 

	header('Content-Type: text/html; charset=utf-8');
	session_start();
	$idioma='';
	$contenido='';

	if (!isset($_SESSION['loginAdmin'])) {
		header("location:acceso_socios.php");
	}

	if (isset($_POST['idioma'])) {
		$idioma=$_POST['idioma'];
	}else{
		$idioma='es';
	}

	if (isset($_POST['modificanoticias'])) {
		//recoger contenido codificado
		$texto1=$_POST['noticiasck'];
		$contenido=$_POST['contenido'];

		file_put_contents('files/sobre_nosotros_titulo_'.$idioma.'.txt', $texto1);
	}


	if (isset($_POST['salir'])) {
		unset($_SESSION['loginAdmin']);

		header("location:acceso_socios.php");
	}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>menuAdministración</title>
 	<link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
 	<link rel="stylesheet" href="css/estilos_menuAdmin.css">
 	<script src="http://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 	<script src="js/evaluarSolicitud.js"></script>
 	<script src='js/pantalla_socios.js'></script>
 	<script src='js/productos_admin.js'></script>
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
 					<li id='gestor'><span>Gestor Contenidos</span></li>
 					<li id='socios'><span>Socios</span></li>
 					<li id='solicitudes'><span>Solicitudes</span></li>
 					<li id='productos'><span>Productos</span></li>
 					<li id='menus'><span>Menús y platos</span></li>
 					
 				</ul>
 			</nav>
 			<div id="bot-salir">
 				<form action="#" method='post'>
 				<input type="submit" value='Salir de administración' name='salir' id='salir'>
 			</form>
 			</div>
 			
 		</div>
 		<div id="contenido">

			<div id="productos-huerta">
 				<h3>PRODUCTOS A LA VENTA</h3>
 				
 				<div id="caja-insert">
 					<h3>CATEGORIAS</h3>
 					<div id="insertar-categoria">
	 					<input type="text" id='nombreCategoria' placeholder='Nombre de la categoria'>
	 					<div id="boton-insert">
	 						Insertar Categoría
	 					</div>
 					</div>
 					<div id="ver-categorias">
 							Todas las Categorias
	 					<select name="categorias" id="categorias">
	 					
	 					</select>
 					</div>
 				</div>
 				<div id="caja2-insert">
 					<h3>PRODUCTOS</h3>
 					<div id="insert-producto">
 						<label>Categoría</label><select id="catePro"></select>
 						<input type="text" id='nombreProducto' placeholder='Nombre del producto'>
 						<textarea id="descripcion" cols="30" rows="10" placeholder='Descripción del producto'></textarea>
 						<input type="text" id='precio-producto' placeholder='Precio'>
 						<div id='foto'>
 							<img src="img/open2.png" alt="">
 						</div>
 						<div id="nombre-archivo">
 						</div>
 						<form action='#' enctype='multipart/form-data' id='formu'><input type='file' id='fotograf' class='fotografias'/></form>
 						<div id="botonera-productos">
 							<div id="insertar-producto">
 							<img src="img/insert.png" alt="">
 						</div>
 						</div>
 						
 					</div>
 				</div>
 			</div>
 				

 			<div id="gestor-content">
 				<h3>GESTOR CONTENIDOS</h3>
				<form action="#" method='post'>
					<select name="idioma"onchange="this.form.submit()">
						<option value="es" <?php if($idioma=='es') {echo "selected";}?>>ES</option>
						<option value="ca" <?php if($idioma=='ca') {echo "selected";}?>>CA</option>
						<option value="en" <?php if($idioma=='en') {echo "selected";}?>>EN</option>
					</select>
				</form>
				<form class="noticiasck" method="post" action="#">
					<input type="hidden" name='contenido' value='<?=$contenido?>'>
					<textarea id="noticiasck" name="noticiasck"><?php readfile('files/sobre_nosotros_titulo_'.$idioma.'.txt');?></textarea>
				<script>
					CKEDITOR.replace( 'noticiasck' );
				</script><br>
				<input type='hidden' name='idioma' value="<?=$idioma?>">
				<input type="submit" name="modificanoticias" value="Modificar" >
		</form>
 			</div>
			<div id="menu-huerta">
				<h3>MENÚS Y PLATOS</h3>
				<div id="posi">
					<div id="pla" class='com'>
					<h4>Insertar nuevos platos</h4>
					<input type="text" id='nombrePlato' placeholder='nombre del plato'>
					<input type="text" id='precioPlato' placeholder='precio'>
					<div id="introducirPlatos">
						<img src="img/nuevo.png" alt="">
						<span>Nuevo plato</span>
					</div>
				</div>
				<div id="me" class='com'>
					<h4>Menús</h4>
					<select name="vista-menus" id="vista-menus">
						<option value="0">Escoja un menú</option>

					</select>
				</div>
				</div>
				<h3>CREAR MENÚ</h3>
				
			</div>



 			<div id="menu-socios">
 				<h3>SOCIOS</h3>
 				<div id="opciones">
 					<div id="busqueda" class='im om'>
 						<img src="img/buscar.ico" alt="">
 					</div>
 					<div id="modificar" class='im om'>
 						<img src="img/modificar.ico" alt="">
 					</div>
 					<div id="eliminar" class='im om'>
 						<img src="img/eliminar.png" alt="">
 					</div>
 				</div>
 				<input type="text" id='buscador' autofocus placeholder='Introduzca socio'>
 				<div id="bus">
 					<ul class='lista'></ul>
 				</div>
 				

 				<form action="#" method='post' id='formu-socio'>
 					<fieldset>
							<legend>Datos personales</legend>
							<input type="hidden" id='ocultos'>
							<div class="pruebas">
								<div class="trato">
			 						<label id='trat'>Tratamiento</label>
			 						<input type="text" id='tratamientos'>
			 					</div>
								<div class="campos-inputs">
			 						<label>Apellidos</label>
			 						<input type="text" id='apellidoss'>
			 					</div>
			 					<div class="campos-inputs">
			 						<label>Nombre</label>
			 						<input type="text" id='nombres'>
			 					</div>
			 					<div class="campos-inputs">	
			 						<label>Fecha de nacimiento</label>
			 						<input type="text" id='fechas'>
			 					</div>
			 					<div class="campos-inputs">	
			 						<label>Nacionalidad</label>
			 						<input type="text" id='nacionalidads'>
			 					</div>
			 					<div class="campos-inputs">	
			 						<label>DNI/PASAPORTE</label>
			 						<input type='text' name="tipodocumento" id="tipodocumentos">
									<input type="text" id='numerodocumentos'>
									</div>
								</div>	
							</fieldset>
							<fieldset>
								<legend>Dirección</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Nombre empresa</label>
					 						<input type="text" id='empresas'>
				 						</div>
					 					<div class="campos-inputs">
					 						<label>Domicilio</label>
					 						<input type="text" id='domicilios'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>Ciudad</label>
					 						<input type="text" id='ciudads'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>Código postal</label>
					 						<input type="text" id='cps'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>País</label>
					 						<input type="text" id='paiss'>
					 					</div>
									</div>
							</fieldset>
							<fieldset>
								<legend>Datos de contacto</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Correo electrónico</label>
					 						<input type="email" id='correos'>
				 						</div>
					 					<div class="campos-inputs">
					 						<label>Teléfono móvil</label>
					 						<input type="text" id='tel1s'>
					 					</div>
					 					<div class="campos-inputs">
					 						<label>Otro teléfono</label>
					 						<input type="text" id='tel2s'>
					 					</div>
									</div>
							</fieldset>
							<fieldset>
								<legend>Datos de acceso</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Usuario</label>
					 						<input type="text" id='users'>
				 						</div>
					 					<div class="campos-inputs">
					 						<label>Contraseña</label>
					 						<input type="password" id='passwords'>
					 					</div>
									</div>
							</fieldset>
							<fieldset>
								<legend>Recomendado por</legend>
									<div class="pruebas">
										<div class="campos-inputs">
					 						<label>Recomendado</label>
					 						<input type="text" id='recs'>
				 						</div>
				 						<div class="campos-inputs">
					 						<label>Fecha alta</label>
					 						<input type="text" id='fechasolicituds'>
				 						</div>
									</div>
							</fieldset>
	 				</form>
	 				<div id="down">
	 					<div id="accept" class='im om'>
 							<img src="img/aceptar.ico" alt="Aceptar modificación" title='Aceptar modificación'>
 						</div>
	 				</div>	
 			</div>



 			<div id="veo">
				<div id="inputs">
					<form action="#" method='post' id='formulario'>
						<h3>SOLICITUD SOCIO</h3>
						<div id="peticiones">
							<h3>Hay <span id='numeroPeticiones'></span> peticiones pendientes</h3>
						</div>
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
								
								<img id='deniega' src="img/denied.png" alt="">
								<img id='acepta' src="img/accept2.png" alt="">
							</div>
	 				</form>	
 				</div>
 			</div>
	
 		</div>
 	</div>
 	
 </body>
 </html>