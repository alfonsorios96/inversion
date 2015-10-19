<?php
	require("PHPMailer/class.smtp.php"); //Importamos la función PHP class.phpmailer
	require("PHPMailer/class.phpmailer.php"); //Importamos la función PHP class.phpmailer

	$mail = new PHPMailer(true);

	try{
		$mail->From = "soporte@orfeosoft.com";
		$mail->FromName = "OrfeoSoft Solutions";
		$mail->Subject = "Bienvenido a Inversión tu casa";
		$mail->AddAddress("mriosm1100@outlook.com","Cliente");
		$mail->MsgHTML(file_get_contents('registroMail.html'));
		$mail->Send();
		} catch (phpmailerException $e) {
		  echo $e->errorMessage(); //Pretty error messages from PHPMailer
		} catch (Exception $e) {
		  echo $e->getMessage(); //Boring error messages from anything else!
		}
?>