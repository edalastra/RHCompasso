<?php
    include("../db/conexao.php");
    include("../update.php");
?>

<?php

$ID_USUARIO = $_POST['ID_USUARIO'];
$FORMULARIOS_ENVIADOS = $_POST['FORMULARIOS_ENVIADOS'];
$FORMULARIOS_RECEBIDOS = $_POST['FORMULARIOS_RECEBIDOS'];
$DOCUMENTOS_FISICOS = $_POST['DOCUMENTOS_FISICOS'];
$CTPS_RECEBIDA = $_POST['CTPS_RECEBIDA'];


if(Documentacao($conn, $ID_USUARIO, $FORMULARIOS_ENVIADOS, $FORMULARIOS_RECEBIDOS, $DOCUMENTOS_FISICOS, $CTPS_RECEBIDA)) { ?>
    <?php
   
    //if($STATUS == 'EM ANDAMENTO' && $ENQUADRAMENTO != NULL){
      //  $STATUS = 'EM CONTRATO';
       // status($conn, $ID_USUARIO, $STATUS);
    //}else{
      //  status($conn, $ID_USUARIO, $STATUS);
    //}
    
?>
    <p class="text-success">Alterado com sucesso!</p>
<?php } else {
    $msg = mysqli_error($conn);
    ?>
    <p class="text-danger">Não foi alterado: <?= $msg ?></p>
<?php
}
header("Refresh:1; url= ../telas/documentacao.php?id=$ID_USUARIO");
?>

