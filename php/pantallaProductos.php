<?php 
	
	session_start();
	require "conexion_lahuerta.php";

	if (!isset($_SESSION['loginAdmin'])) {
		header("location:../acceso_socios.php");
	}

	$opcion=$_POST['opcion'];

	if ($opcion=='IC') {
		$nombre=$_POST['nombre'];

		$sql = "INSERT INTO categorias VALUES (NULL,'$nombre')";
		if (!mysqli_query($conexionHuerta, $sql)) {
			if (mysqli_errno($conexionHuerta)==1062) {
				$mensaje="20Categoria con nombre $nombre ya existe en la base de datos";
				echo "$mensaje";
			} else {
				die(mysqli_error($conexionHuerta));
			}
		}
		else{
			$mensaje= "00Categoria Insertada";
			echo "$mensaje";
		}
	}else if($opcion=='C'){
		$sql = "SELECT * FROM categorias ORDER BY nombrecategoria";
	$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));

	//Array para guardar las personas
	$arrayConsultas=array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($arrayConsultas, array('idcategoria'=>$row['idcategoria'],'nombrecategoria'=>$row['nombrecategoria']));
		}
	echo json_encode($arrayConsultas);
	}else if ($opcion=='IP') {
		$nombreProducto=$_POST['nombreProducto'];
		$descripcion=$_POST['descripcion'];
		$precioProducto=$_POST['precioProducto'];
		$rutaImagen=$_POST['rutaImagen'];
		$idcategoria=$_POST['idcategoria'];

		$sql = "INSERT INTO productos VALUES (NULL,'$nombreProducto','$descripcion','$precioProducto','$rutaImagen','$idcategoria')";

		if (!mysqli_query($conexionHuerta, $sql)) {
			if (mysqli_errno($conexionHuerta)==1062) {
				$mensaje="20Producto con nombre $nombreProducto ya existe en la base de datos";
				echo "$mensaje";
			} else {
				die(mysqli_error($conexionHuerta));
			}
		}
		else{
			$mensaje= "00Producto Insertado";
			echo "$mensaje";
		}
	}

 ?>