<?php 

	session_start();


	require('PHPMailer-master/PHPMailerAutoload.php');
	header('Content-Type: text/html; charset=utf-8');

	$nombreCompleto=$_POST['nombreCompleto'];
	$remitente=$_POST['email'];
	$asunto=$_POST['asunto'];
	$mensaje=$_POST['mensaje'];
	$destinatario='lahuertagastroclub@hola.com';

	if ($nombreCompleto!='' && $remitente!='' && $asunto!='' && $mensaje!='') {
		//envio de correo por phpmailer
		$mail = new PHPMailer();
		$mail->CharSet = 'utf-8';
		$mail->From = $remitente;//"remitente@mail.com";
		$mail->FromName = $nombreCompleto;//"Nombre remitente";
		$mail->AddAddress($destinatario, "La Huerta");
		$mail->isHTML(true); // el mensaje es en formato HTML
		$mail->Subject = $asunto;
		$mail->Body = $mensaje;


		if(!$mail->send()) {
			echo 'Mensaje NO enviado';
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo '00Mensaje enviado correctamente';
			}
	}
	

 ?>