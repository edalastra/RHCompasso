<?php
    include("../db/conexao.php");
    include("../update.php");
    $DATA = date_create();
    $DATA_HOJE = date_format($DATA, 'y-m-d');
?>

<?php
$STATUS = $_POST['STATUS'];
$ID_USUARIO = $_POST['ID_USUARIO'];
$PROPOSTA_RECEBIDA = $_POST['PROPOSTA_RECEBIDA'];
$DE_ACORDO_DIRECAO = $_POST['DE_ACORDO_DIRECAO'];
$ENQUADRAMENTO = $_POST['ENQUADRAMENTO'];
$ENVIO_PROPOSTA = $_POST['ENVIO_PROPOSTA'];
$COMUNICAR_PROPOSTA_ENVIADA = $_POST['COMUNICAR_PROPOSTA_ENVIADA'];
$ACEITA_RECUSA_CANDIDATO = $_POST['ACEITA_RECUSA_CANDIDATO'];
$COMENTARIO = $_POST['COMENTARIO'];
$COMUNICAR_STATUS = $_POST['COMUNICAR_STATUS'];
$PROJETO = $_POST['PROJETO'];
$id = $ID_USUARIO;

if(Proposta($conn, $ID_USUARIO, $PROPOSTA_RECEBIDA, $DE_ACORDO_DIRECAO, $ENQUADRAMENTO, $ENVIO_PROPOSTA, $COMUNICAR_PROPOSTA_ENVIADA,$ACEITA_RECUSA_CANDIDATO, $COMENTARIO, $COMUNICAR_STATUS) && projeto($conn, $ID_USUARIO, $PROJETO) && status($conn, $ID_USUARIO, $STATUS)){
    /*if($STATUS == 'EM VALIDAÇÃO' && $ENVIO_PROPOSTA != NULL){
        $STATUS = 'AGUARDAR ACEITE';
        status($conn, $ID_USUARIO, $STATUS);
    } elseif ($STATUS == 'AGUARDAR ACEITE' && strtotime($ENVIO_PROPOSTA) < strtotime($DATA_HOJE)){
        $STATUS = 'REALIZAR CONTATO';
        status($conn, $ID_USUARIO, $STATUS);
    } elseif ($STATUS == 'REALIZAR CONTATO' && strtotime($ENVIO_PROPOSTA) < strtotime($DATA_HOJE)){
        $STATUS = 'RETORNO PENDENTE';
        status($conn, $ID_USUARIO, $STATUS);
    }else{
        status($conn, $ID_USUARIO, $STATUS);
    }*/
?>
    <head>
    <meta charset="UTF-8">
    <title>RH Contratações</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/arquivo.css">
    </head>
    <h1 class="text-success">Alterado com sucesso!</h1>
<?php
 } else {
    $msg = mysqli_error($conn);
?>
    <head>
    <meta charset="UTF-8">
    <title>RH Contratações</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/arquivo.css">
    </head>
    <p class="text-danger">Não foi alterado: <?= $msg ?></p>
<?php
}

?>
<?php

header("Refresh:1; url= ../telas/funcionario.php?id=$ID_USUARIO");

?>



