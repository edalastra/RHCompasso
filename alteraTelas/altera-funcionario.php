<?php
    include("../db/conexao.php");
    include_once("../update.php");
?>
<?php



$USUARIO_ID = $_POST['USUARIO_ID'];
$ID_SEDE = $_POST['ID_SEDE'];
$ID_TIPO = $_POST['ID_TIPO'];
$ID_CAPTACAO = $_POST['ID_CAPTACAO'];
$CARGA_HORARIA = $_POST['CARGA_HORARIA'];
$HORARIO = $_POST['HORARIO'];
$NOME = $_POST['NOME'];
$FONE_CONTATO = $_POST['FONE_CONTATO'];
$CARGO = $_POST['CARGO'];
$SOLICITANTE = $_POST['SOLICITANTE'];
$CONTROLE_DATA_ADMISSAO = $_POST['CONTROLE_DATA_ADMISSAO'];
$REMUNERACAO_BASE = $_POST['REMUNERACAO_BASE'];
$GRATIFICACAO = $_POST['GRATIFICACAO'];
$CLIENTE = $_POST['CLIENTE'];
$PROJETO = $_POST['PROJETO'];
$EMAIL = $_POST['EMAIL'];
$DATA_ADMISSAO = $_POST['DATA_ADMISSAO'];
$POSICAO_DATA = $_POST['POSICAO_DATA'];
$POSICAO_COMENTARIO = $_POST['POSICAO_COMENTARIO'];
$ADMINISTRATIVO = $_POST['ADMINISTRATIVO'];


$REMUNERACAO_BASE = str_replace(',','.',preg_replace('#[^\d\,]#is','',$REMUNERACAO_BASE)); 
$GRATIFICACAO = str_replace(',','.',preg_replace('#[^\d\,]#is','',$GRATIFICACAO)); 


if(funcionario($conn, $USUARIO_ID, $ID_SEDE, $ID_TIPO, $ID_CAPTACAO, $CARGA_HORARIA, $HORARIO, $NOME, $FONE_CONTATO, $DATA_ADMISSAO, $CARGO, $SOLICITANTE, $CONTROLE_DATA_ADMISSAO, $REMUNERACAO_BASE, $GRATIFICACAO, $CLIENTE, $PROJETO, $EMAIL, $ADMINISTRATIVO, $POSICAO_DATA, $POSICAO_COMENTARIO)) { ?>
    <p class='text-success' class="text-success">Alterado com sucesso!</p>


<?php
//if($STATUS == 'EM ANDAMENTO' && $ENQUADRAMENTO != NULL){
//  $STATUS = 'EM CONTRATO';
// status($conn, $ID_USUARIO, $STATUS);
//}else{
//  status($conn, $ID_USUARIO, $STATUS);
//}
?>

<?php } else {
    $msg = mysqli_error($conn);
?>
    <p class="text-danger">Não foi alterado: <?= $msg ?></p>
<?php
}
    header("Refresh: 1; url=/projeto/telas/menuPrincipal.php");
?>

