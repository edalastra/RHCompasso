<?php
    include("../db/conexao.php");
    include("../update.php");
?>

<?php

$ID_USUARIO = $_POST['ID_USUARIO'];
$BOAS_VINDAS_INGR_AGENDADA = $_POST['BOAS_VINDAS_INGR_AGENDADA'];
$BOAS_VINDAS_INGR_REALIZADA = $_POST['BOAS_VINDAS_INGR_REALIZADA'];
$BOAS_VINDAS_SALA = $_POST['BOAS_VINDAS_SALA'];
$BOAS_VINDA_ACOMPANHAMENTO_MENSAL = $_POST['BOAS_VINDA_ACOMPANHAMENTO_MENSAL'];
$LAYOUT_BOAS_VINDAS_MENSAL = $_POST['LAYOUT_BOAS_VINDAS_MENSAL'];

if(recepcao ($conn, $ID_USUARIO, $BOAS_VINDAS_INGR_AGENDADA, $BOAS_VINDAS_INGR_REALIZADA, $BOAS_VINDAS_SALA, $BOAS_VINDA_ACOMPANHAMENTO_MENSAL, $LAYOUT_BOAS_VINDAS_MENSAL)){?>
<?php
//if($STATUS == 'EM ANDAMENTO' && $ENQUADRAMENTO != NULL){
  //  $STATUS = 'EM CONTRATO';
   // status($conn, $ID_USUARIO, $STATUS);
//}else{
  //  status($conn, $ID_USUARIO, $STATUS);
//}
    ?>
    <p class="text-success ">Alterado com sucesso!</p>
<?php
} else {
    $msg = mysqli_error($conn);
?>
    <p class="text-danger">Não foi alterado: <?= $msg ?></p>
<?php
    }
    header("Refresh: 1; ../telas/recepcao.php?id=$ID_USUARIO");
?>