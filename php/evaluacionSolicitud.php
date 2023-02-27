<?php 
	
	session_start();
	require "conexion_lahuerta.php";
	if (!isset($_SESSION['loginAdmin'])) {
		header("location:../acceso_socios.php");
	}
	
	
	
	$pagina=$_POST['pagina'];
	$registrosAmostrar=1;
	$numeroRegistro=($pagina-1)*$registrosAmostrar;

	$sql = "SELECT * FROM solicitud_socios ORDER BY idsolicitud LIMIT $numeroRegistro,$registrosAmostrar";
	$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));

	$arrayDatos=array();
	while($row = mysqli_fetch_assoc($result)){
		array_push($arrayDatos, array('idsolicitud'=>$row['idsolicitud'],'tratamiento'=>$row['tratamiento'],'apellidos'=>$row['apellidos'],'nombre'=>$row['nombre'],'fechanacimiento'=>$row['fechanacimiento'],'nacionalidad'=>$row['nacionalidad'],'documento'=>$row['documento'],'numero'=>$row['numero'],'nombreempresa'=>$row['nombreempresa'],'domicilio'=>$row['domicilio'],'ciudad'=>$row['ciudad'],'codigopostal'=>$row['codigopostal'],'pais'=>$row['pais'],'email'=>$row['email'],'telefono1'=>$row['telefono1'],'telefono2'=>$row['telefono2'],'usuario'=>$row['usuario'],'password'=>$row['password'],'recomendado'=>$row['recomendado'],'fechasolicitud'=>$row['fechasolicitud']));
	}

	//consultar el número de registros totales
	$sql="SELECT COUNT(*) AS 'numreg' FROM solicitud_socios";
	$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));

	$row=mysqli_fetch_assoc($result);

	$filas=$row['numreg'];

	if ($filas%$registrosAmostrar==0) {
		$paginas=$filas/$registrosAmostrar;
		} else {
		$paginas=intval($filas/$registrosAmostrar)+1;
		//$paginas=ceil($filas/registrosAmostrar);Es lo mismo que usar el intval
	}

	echo json_encode(array($arrayDatos,$paginas));
 ?>