<?php 
	

	session_start();

	if (!isset($_SESSION['loginAdmin'])) {
		header("location:../acceso_socios.php");
	}
	require "conexion_lahuerta.php";

	$opcion=$_POST['opcion'];

	if ($opcion=='B') {
		$palabra=$_POST['palabra'];
		if ($palabra=='') {
			return false;
		}else{
			$sql="SELECT * FROM socios WHERE apellidos LIKE'$palabra%'";
		$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));
		$arrayDatos=array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($arrayDatos, array('idsocio'=>$row['idsocio'],'apellidos'=>$row['apellidos'],'nombre'=>$row['nombre']));
		}
		echo json_encode($arrayDatos);
		}
		
	}else if ($opcion=='V') {
		$nombre=$_POST['nombre'];
		$caracter=",";
		$encuentra=strpos($nombre, $caracter);
		$apellidos=substr($nombre,0,$encuentra);
		$nombre=substr($nombre, $encuentra+2);
		
		$sql="SELECT * FROM socios WHERE apellidos = '$apellidos' and nombre='$nombre' ";

		$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));

		$arraySocio=array();

		while($row = mysqli_fetch_assoc($result)) {
			array_push($arraySocio, array('idsocio'=>$row['idsocio'],'tratamiento'=>$row['tratamiento'],'apellidos'=>$row['apellidos'],'nombre'=>$row['nombre'],'fechanacimiento'=>$row['fechanacimiento'],'nacionalidad'=>$row['nacionalidad'],'tipodocumento'=>$row['tipodocumento'],'numerodocumento'=>$row['numerodocumento'],'nombreempresa'=>$row['nombreempresa'],'domicilio'=>$row['domicilio'],'ciudad'=>$row['ciudad'],'codigopostal'=>$row['codigopostal'],'pais'=>$row['pais'],'email'=>$row['email'],'telefono1'=>$row['telefono1'],'telefono2'=>$row['telefono2'],'usuario'=>$row['usuario'],'password'=>$row['password'],'recomendado'=>$row['recomendado'],'fechasolicitud'=>$row['fechasolicitud']));
			}

		//convertir el array php a formato json
		echo json_encode($arraySocio);
	}else if($opcion=='M'){

		$ide=$_POST['ide'];
		$trat=$_POST['trat'];
		$ape=$_POST['ape'];
		$nom=$_POST['nom'];
		$fe=$_POST['fe'];
		$na=$_POST['na'];
		$ti=$_POST['ti'];
		$nu=$_POST['nu'];
		$em=$_POST['em'];
		$domi=$_POST['domi'];
		$ciu=$_POST['ciu'];
		$cp=$_POST['cp'];
		$pa=$_POST['pa'];
		$co=$_POST['co'];
		$te1=$_POST['te1'];
		$te2=$_POST['te2'];
		//$us=$_POST['us'];
		//$pas=$_POST['pas'];
		$rec=$_POST['rec'];

		$sql = "UPDATE socios SET tratamiento='$trat', apellidos='$ape', nombre='$nom', fechanacimiento='$fe',nacionalidad='$na', tipodocumento='$ti',numerodocumento='$nu', nombreempresa='$em', domicilio='$domi', ciudad='$ciu', codigopostal='$cp', pais='$pa', email='$co', telefono1='$te1', telefono2='$te2', recomendado='$rec' WHERE idsocio=$ide";
	
	mysqli_query($conexionHuerta, $sql)or die(mysqli_error($conexionHuerta));

	echo "Modificación efectuada";
	}else if($opcion=='E'){
		$idsocio=$_POST['idsocio'];

		$sql = "DELETE FROM socios WHERE idsocio=$idsocio";
		mysqli_query($conexionHuerta, $sql)or die(mysqli_error($conexionHuerta));

		echo "00Baja efectuada";
	}else if ($opcion=='N') {
		$nombrePlato=$_POST['nombreplato'];
		$precioPlato=$_POST['precioplato'];

		$sql="INSERT INTO platos VALUES(NULL,'$nombrePlato','$precioPlato')";

		if (!mysqli_query($conexionHuerta, $sql)) {
			if (mysqli_errno($conexionHuerta)==1062) {
				$mensaje="20plato con nombre: $nombrePlato ya existe en la base de datos";
				echo "$mensaje";
			} else {
				die(mysqli_error($conexionHuerta));
			}
		}
		else{
			$mensaje= "00Plato insertado correctamente";
			echo "$mensaje";
		}
	}


 ?>