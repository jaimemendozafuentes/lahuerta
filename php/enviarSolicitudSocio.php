<?php 

	require 'conexion_lahuerta.php';
	require('PHPMailer-master/PHPMailerAutoload.php');
	
	$tratamiento=trim($_POST['tratamiento']);
	$apellidos=trim($_POST['apellidos']);
	$nombre=trim($_POST['nombre']);
	$fecha=trim($_POST['fecha']);
	$nacionalidad=trim($_POST['nacionalidad']);
	$tipoDocumento=trim($_POST['tipoDocumento']);
	$numeroDoc=trim($_POST['numeroDoc']);
	$empresa=trim($_POST['empresa']);
	$domicilio=trim($_POST['domicilio']);
	$ciudad=trim($_POST['ciudad']);
	$cp=trim($_POST['cp']);
	$pais=trim($_POST['pais']);
	$email=trim($_POST['email']);
	$telefono=trim($_POST['telefono']);
	$telOpcional=trim($_POST['telOpcional']);
	$usuario=trim($_POST['usuario']);
	$password=trim(md5(sha1($_POST['password'])));
	$recomendado=trim($_POST['recomendado']);



	$mensaje='';
	$mensaje2='';
	$destinatario='lahuertagastroclub@hola.com';
	$asunto='Nueva solicitud de socio';
	$asunto2='Solicitud socio de La Huerta Gastroclub';

	$mensaje.="<h3>Se ha recibido una nueva solicitud de socio.</h3>";
	$mensaje.="<p>El Sr/a $nombre $apellidos ha realizado una solicitud de socio.</p>";
	$mensaje.="<p>La recomendación es de $recomendado</p>";

	$mensaje2.="<h3>Estimado/a $nombre $apellidos</h3>";
	$mensaje2.="<p>Su solicitud de socio/a se ha tramitado correctamente.</p>";
	$mensaje2.="<p>En breve recibirá un correo con el resultado de su solicitud</p>";


	mysqli_autocommit($conexionHuerta,FALSE);

	$sql="INSERT INTO solicitud_socios VALUES(NULL,'$tratamiento','$apellidos','$nombre','$fecha','$nacionalidad','$tipoDocumento','$numeroDoc','$empresa','$domicilio','$ciudad','$cp','$pais','$email','$telefono','$telOpcional','$usuario','$password','$recomendado',CURRENT_TIMESTAMP)";

	$estado=mysqli_query($conexionHuerta, $sql) or die(mysqli_error($conexionHuerta));
	
	if ($estado) {
		$mail = new PHPMailer();
		$mail->CharSet = 'utf-8';
		$mail->From = $email;//"remitente@mail.com";
		$mail->FromName = "$apellidos, $nombre";//"Nombre remitente";
		$mail->AddAddress($destinatario, "La Huerta");
		$mail->isHTML(true); // el mensaje es en formato HTML
		$mail->Subject = $asunto;
		$mail->Body = $mensaje;

		$mail2 = new PHPMailer();
		$mail2->CharSet = 'utf-8';
		$mail2->From = $destinatario;//"remitente@mail.com";
		$mail2->FromName = "La Huerta Gastroclub";//"Nombre remitente";
		$mail2->AddAddress($email);
		$mail2->isHTML(true); // el mensaje es en formato HTML
		$mail2->Subject = $asunto2;
		$mail2->Body = $mensaje2;


		if(!$mail->send()) {
			echo 'Mensaje1 NO enviado';
			echo 'Mailer1 Error: ' . $mail->ErrorInfo;
			mysqli_rollback($conexionHuerta);
		}else if(!$mail2->send()){
			echo 'Mensaje2 NO enviado';
			echo 'Mailer2 Error: ' . $mail2->ErrorInfo;
			mysqli_rollback($conexionHuerta);
		}else {
			echo '00Mensaje enviado correctamente';
			mysqli_commit($conexionHuerta);
			}
	}

 ?>