<?php
    include("../db/conexao.php");
    include("../update.php");
?>

<?php

$ID_USUARIO = $_POST['ID_USUARIO'];
$ENVIO_SOLICITANTE_PRI = $_POST['ENVIO_SOLICITANTE_PRI'];
$DATA_VENCIMENTO_PRI = $_POST['DATA_VENCIMENTO_PRI'];
$RENOVACAO = $_POST['RENOVACAO'];
$ENVIO_SOLICITANTE_SEG = $_POST['ENVIO_SOLICITANTE_SEG'];
$DATA_VENCIMENTO_SEG = $_POST['DATA_VENCIMENTO_SEG'];
$EFETIVACAO = $_POST['EFETIVACAO'];



if(vencimentos($conn, $ID_USUARIO, $ENVIO_SOLICITANTE_PRI, $DATA_VENCIMENTO_PRI, $RENOVACAO, $ENVIO_SOLICITANTE_SEG, $EFETIVACAO, $DATA_VENCIMENTO_SEG)){
//if($STATUS == 'EM ANDAMENTO' && $ENQUADRAMENTO != NULL){
  //  $STATUS = 'EM CONTRATO';
   // status($conn, $ID_USUARIO, $STATUS);
//}else{
  //  status($conn, $ID_USUARIO, $STATUS);
//}
?>
    <h1 class="text-success">Alterado com sucesso!</h1>
<?php
 } else {
    $msg = mysqli_error($conn);
    ?>
    <p class="text-danger">Não foi alterado: <?= $msg ?></p>
        <?php
    }
?>
<?php

header("Refresh:1; url=../telas/vencimentosContratos.php");
?>