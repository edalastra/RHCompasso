<?php
include_once('config/config-email.php');

date_default_timezone_set('Etc/UTC');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$nome_destinatario = $_POST['nome'];
$email_destinatario = $_POST['email'];
$assunto = $_POST['assunto'];
$body = $_POST['body'];
$de = $_POST['de'];
$alias = $_POST['como'];
$senha = $_POST['senha'];

function enviaEmail($email_destinatario, $nome_destinatario, $assunto, $body, $de, $senha, $alias){
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 4;
  $mail->Host = HOST;
  $mail->Port = PORT;
  $mail->SMTPSecure = SMTP_SECURE;
  $mail->SMTPAuth = SMTP_AUTH;
  $mail->Username = $de;
  $mail->Password = $senha;
  $mail->setFrom($alias, SET_FROM_NAME);
  $mail->addAddress($email_destinatario, $nome_destinatario);
  $mail->CharSet = CHARSET;
  $mail->Subject = $assunto;
  $body = preg_replace('/<img id="img1" src=(.*)alt="compasso" align="left">/', '<img id="img1" src="cid:compasso" alt="compasso" align="left">', $body);
  $body = preg_replace('/<img id="img2" src=(.*)alt="compasso2">/', '<img id="img2" src="cid:compasso2" alt="compasso2">', $body);
  $mail->msgHTML($body);

  for ($ct = 0; $ct < count($_FILES['arquivo']['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['arquivo']['name'][$ct]));
        $filename = $_FILES['arquivo']['name'][$ct];
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
        } else {
            $msg = 'Falha ao mover no' . $uploadfile;
        }
  }

  $mail->AddEmbeddedImage('img/compasso.jpg','compasso');
  $mail->AddEmbeddedImage('img/compasso2.jpg','compasso2');


  //JOÃO, TESTAR ASSIM TAMBÉM  $mail->AddAttachment($_FILES['VARIÁVEL POST']['tmp_name'], $_FILES['VARIÁVEL POST']['name']);

  // $mail->AltBody = 'This is a plain-text message body';

  if (!$mail->send()) {
      echo "Erro ao Enviar: " . $mail->ErrorInfo;
      // echo $nome_destinatario;
      // echo $email_destinatario;
      // echo $assunto;
      // echo $body;

  } else {
      echo "<script>document.location='http://localhost/RHCompasso/telas/menuPrincipal.php'</script>";
  }


}

enviaEmail($email_destinatario, $nome_destinatario, $assunto, $body, $de, $senha, $alias=$de);

?>
