<?php
    include("../db/conexao.php");
    include("../update.php");
?>

<?php

$ID_USUARIO = $_POST['ID_USUARIO'];
$EMAIL_SUP = $_POST['EMAIL_SUP'];
$USUARIO = $_POST['USUARIO'];
$SENHA = $_POST['SENHA'];
$EQUIPAMENTO = $_POST['EQUIPAMENTO'];
$TRANSLADO = $_POST['TRANSLADO'];
$GRUPOS_DE_EMAIL = $_POST['GRUPOS_DE_EMAIL'];


if(suporte($conn, $ID_USUARIO, $EMAIL_SUP, $USUARIO, $SENHA, $EQUIPAMENTO, $TRANSLADO, $GRUPOS_DE_EMAIL)){?>
<?php
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
    header("Refresh:1; url=../telas/suporteinterno.php?id=$ID_USUARIO");
?>