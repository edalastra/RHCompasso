<?php
    include("../db/conexao.php");
    include("../update.php");
?>

<?php

$ID_USUARIO = $_POST['ID_USUARIO'];
$ENVIO = $_POST['ENVIO'];
$RECEBIDO = $_POST['RECEBIDO'];
$ANEXAR_COMPR_DOMIN = $_POST['ANEXAR_COMPR_DOMIN'];
$PLANILHA_CONTAS = $_POST['PLANILHA_CONTAS'];
$FORM_COMPR_BANCARIO = $_POST['FORM_COMPR_BANCARIO'];



if(bancario($conn, $ID_USUARIO, $ENVIO, $RECEBIDO, $ANEXAR_COMPR_DOMIN, $PLANILHA_CONTAS, $FORM_COMPR_BANCARIO)){
//if($STATUS == 'EM ANDAMENTO' && $ENQUADRAMENTO != NULL){
  //  $STATUS = 'EM CONTRATO';
   // status($conn, $ID_USUARIO, $STATUS);
//}else{
  //  status($conn, $ID_USUARIO, $STATUS);
//}
?>
    <p class="text-success">Alterado com sucesso!</p>
<?php
 } else {
    $msg = mysqli_error($conn);
    ?>
    <p class="text-danger">Não foi alterado: <?= $msg ?></p>
        <?php
    }
?>
<?php

header("Refresh:1; url=../telas/bancarios.php?id=$ID_USUARIO");
?>