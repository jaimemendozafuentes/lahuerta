<?php 
	require 'conexion_lahuerta.php';
	require('PHPMailer-master/PHPMailerAutoload.php');

	session_start();

	if (!isset($_SESSION['loginAdmin'])) {
		header("location:../acceso_socios.php");
	}

	$id=$_POST['id'];
	$tratamiento=trim($_POST['tratamiento']);
	$apellidos=trim($_POST['apellidos']);
	$nombre=trim($_POST['nombre']);
	$fecha=trim($_POST['fecha']);
	$nacionalidad=trim($_POST['nacionalidad']);
	$tipodocumento=trim($_POST['tipodocumento']);
	$numerodocumento=trim($_POST['numerodocumento']);
	$empresa=trim($_POST['empresa']);
	$domicilio=trim($_POST['domicilio']);
	$ciudad=trim($_POST['ciudad']);
	$cp=trim($_POST['cp']);
	$pais=trim($_POST['pais']);
	$email=trim($_POST['email']);
	$tel1=trim($_POST['tel1']);
	$tel2=trim($_POST['tel2']);
	$user=trim($_POST['user']);
	$password=trim($_POST['password']);
	$rec=trim($_POST['rec']);
	$tipousuario='US';

	$mensaje='';
	$asunto='Aceptación Socio';
	$mensaje.="<h3>Estimado/a $nombre $apellidos</h3>";
	$mensaje.="<p>Le informamos que ya forma parte de la asociación.</p>";
	$mensaje.="<p>A partir de ahora puede beneficiarse de la asociación</p>";

	mysqli_autocommit($conexionHuerta,FALSE);

	$sql="INSERT INTO socios VALUES(NULL,'$tratamiento','$apellidos','$nombre','$fecha','$nacionalidad','$tipodocumento','$numerodocumento','$empresa','$domicilio','$ciudad','$cp','$pais','$email','$tel1','$tel2','$tipousuario' ,'$user','$password','$rec',CURRENT_TIMESTAMP)";


	if (!mysqli_query($conexionHuerta, $sql)) {
		if (mysqli_errno($conexionHuerta)==1062) {
		$mensaje3='';
		$mensaje3.="20persona con nif $numerodocumento ya existe en la base de datos";
		$mensaje3.="20persona con email $email ya existe";
		$mensaje3.="20persona con usuario $user ya existe";
		echo "$mensaje3";
		} else {
			die(mysqli_error($conexionHuerta));
			}
	}
	else{
		$mail = new PHPMailer();
		$mail->CharSet = 'utf-8';
		$mail->From = "lahuertagastroclub@gmail.com";//"remitente@mail.com";
		$mail->FromName = "La Huerta GastroClub";//"Nombre remitente";
		$mail->AddAddress($email);
		$mail->isHTML(true); // el mensaje es en formato HTML
		$mail->Subject = $asunto;
		$mail->Body = $mensaje;

		if(!$mail->send()) {
			echo 'Mensaje1 NO enviado';
			echo 'Mailer1 Error: ' . $mail->ErrorInfo;
			mysqli_rollback($conexionHuerta);
		}else {
			$sql = "DELETE FROM solicitud_socios WHERE idsolicitud=$id";
			mysqli_query($conexionHuerta, $sql)or die(mysqli_error($conexionHuerta));
			$mensaje2= "00Alta Efectuada";
			echo "$mensaje2";
			mysqli_commit($conexionHuerta);
			}	
	}

 ?>