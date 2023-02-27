<?php 
	
	require 'conexion_lahuerta.php';

	$opcion=$_POST['opcion'];
	if ($opcion=='CD') {
		

		$sql="SELECT * FROM productos INNER JOIN categorias ON productos.idcategoria = categorias.idcategoria";
		$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));
		$arrayDestacados=array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($arrayDestacados, array('idproducto'=>$row['idproducto'],'nombreproducto'=>$row['nombreproducto'],'descripcion'=>$row['descripcion'],'precio'=>$row['precio'],'rutaimagen'=>$row['rutaimagen'],'nombrecategoria'=>$row['nombrecategoria']));
		}

		//Hacemos un Random para elegir cuatro productos al azar para la sección de destacados.
		$nuevoArray=array();
		$cuatroProductos=array_rand($arrayDestacados,4);
		//Desordenamos el orden de los 4 elementos aleatorios
		shuffle($cuatroProductos);
		foreach ($cuatroProductos as $key) {
			array_push($nuevoArray, $arrayDestacados[$key]);
		}
		echo json_encode($nuevoArray);
	}else if ($opcion=='CC') {
		$sql="SELECT * FROM categorias";

		$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));

		$arrayCategorias=array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($arrayCategorias, array('idcategoria'=>$row['idcategoria'],'nombrecategoria'=>$row['nombrecategoria']));
		}
		echo json_encode($arrayCategorias);
	}else if ($opcion=='TP') {
		//AQUI LOS PRODUCTOS POR CATEGORIA
		$pagina=$_POST['pagina'];
		$idcategoria=$_POST['idcategoria'];

		$registrosAmostrar=8;
		$numeroRegistro=($pagina-1)*$registrosAmostrar;

		$sql = "SELECT * FROM productos INNER JOIN categorias ON productos.idcategoria=categorias.idcategoria WHERE productos.idcategoria='$idcategoria' ORDER BY nombreproducto LIMIT $numeroRegistro,$registrosAmostrar";
		$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));
		$arrayProductos=array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($arrayProductos, array('idproducto'=>$row['idproducto'],'nombreproducto'=>$row['nombreproducto'],'descripcion'=>$row['descripcion'],'precio'=>$row['precio'],'rutaimagen'=>$row['rutaimagen'],'nombrecategoria'=>$row['nombrecategoria']));
		}

		$sql="SELECT COUNT(*) AS 'numreg' FROM productos WHERE idcategoria='$idcategoria'";
		$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));

		$row=mysqli_fetch_assoc($result);//No hace falta poner un while porque nos devuelve una única fila
		$filas=$row['numreg'];

		if ($filas%$registrosAmostrar==0) {
		$paginas=$filas/$registrosAmostrar;
		} else {
		$paginas=intval($filas/$registrosAmostrar)+1;
		//$paginas=ceil($filas/registrosAmostrar);Es lo mismo que usar el intval
		}
		echo json_encode(array($arrayProductos,$paginas));


	}else if($opcion=='PR'){
		$sql="SELECT * FROM productos INNER JOIN categorias ON productos.idcategoria = categorias.idcategoria";
		$result=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));
		$arrayDestacados2=array();
		while($row = mysqli_fetch_assoc($result)){
			array_push($arrayDestacados2, array('idproducto'=>$row['idproducto'],'nombreproducto'=>$row['nombreproducto'],'descripcion'=>$row['descripcion'],'precio'=>$row['precio'],'rutaimagen'=>$row['rutaimagen'],'nombrecategoria'=>$row['nombrecategoria']));
		}

		//Hacemos un Random para elegir cuatro productos al azar para la sección de destacados.
		$nuevoArraydos=array();
		$cuatroProductos2=array_rand($arrayDestacados2,8);
		//Desordenamos el orden de los 4 elementos aleatorios
		shuffle($cuatroProductos2);
		foreach ($cuatroProductos2 as $key) {
			array_push($nuevoArraydos, $arrayDestacados2[$key]);
		}
		echo json_encode($nuevoArraydos);
	}

 ?>