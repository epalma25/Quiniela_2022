<?php
//Load composer's autoloader
require_once('PHPMailer/PHPMailerAutoload.php'); 

$mail = new PHPMailer(true); 
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->SMTPDebug = 2; 
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Host = 'mail.twiceeight.cl';
$mail->Port =587 ;// TCP port to connect to 587
$mail->CharSet = 'UTF-8';
$mail->Username ='edwin.palma@twiceeight.cl'; //Email para enviar
$mail->Password = '2T[-7Hj0W7Ugwj'; //Su password
//Agregar destinatario
$mail->setFrom('twiceeig@twiceeight.cl', 'Notificacion Password');
$mail->AddAddress('epalma@cl.estee.com');//A quien mandar email
$mail->SMTPKeepAlive = true;  
$mail->Mailer = "smtp"; 


    //Content
$mail->isHTML(true); // Set email format to HTML
$mail->Subject = 'Notificacion Password';
$mail->Body    = '<b> Estimado (a) </b> <br><br> Detalle de la cuenta:  <br> <br> Correo : <br> <br> Contraseña  <b>Password</b>';
$mail->AltBody = 'Envio de Credenciales';

if(!$mail->send()) {
  echo 'Error al enviar email';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Mail enviado correctamente';
}
?>