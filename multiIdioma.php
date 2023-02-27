<?php 
session_start();

//idioma por defecto
$idioma='es';

$archivo = basename($_SERVER['PHP_SELF']);
//creamos un array con los idiomas permitidos
$idiomasPermitidos=array('es','ca','en');
if (isset($_GET['lang'])) {//El usuario ha pulsado para cambiar el idioma
	//verificamos que el idioma existe
		if (in_array($_GET['lang'], $idiomasPermitidos)) {
		$idioma=$_GET['lang'];//asignamos el idioma seleccionado por el usuario
		$_COOKIE['idioma']=$idioma;
		setcookie('idioma',$idioma,time()+3600);
		}else{
		header("Location: index.php?lang=$idioma");
		}
	}else if (isset($_COOKIE['idioma'])) {
	$idioma=$_COOKIE['idioma'];
	}else{
		if (in_array(substr($_SERVER['HTTP_ACCEPT_LANGUAGE'],0,2), $idiomasPermitidos)) {
			$idioma=substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		}
	}

	include("comunes/index_contenido_$idioma.php");

 ?>