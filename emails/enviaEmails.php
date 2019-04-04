<?php
include_once('config/config-email.php');

date_default_timezone_set('Etc/UTC');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$id = $_POST['id'];
$nome_destinatario = $_POST['nome'];
$email_destinatario = $_POST['email'];
$assunto = $_POST['assunto'];

function enviaEmail($email_destinatario, $nome_destinatario, $assunto){
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 4;
  $mail->Host = HOST;
  $mail->Port = PORT;
  $mail->SMTPSecure = SMTP_SECURE;
  $mail->SMTPAuth = true;
  $mail->Username = USERNAME;
  $mail->Password = PASSWORD;
  $mail->setFrom(SET_FROM_EMAIL, SET_FROM_NAME);
  $mail->addAddress($email_destinatario, $nome_destinatario);
  $mail->Subject = $assunto;
  $mail->msgHTML("body");
  // $mail->AltBody = 'This is a plain-text message body';
  if (!$mail->send()) {
      echo "Erro ao Enviar: " . $mail->ErrorInfo;
      header('location:../telas/funcionario.php');
  } else {
      echo "Mensagem Enviada!";

  }

}



 ?>
