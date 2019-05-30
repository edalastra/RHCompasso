<?php
require_once('conexao.php');

$file_tmp = $_FILES["arquivo"]["tmp_name"];
$file_name = $_FILES["arquivo"]["name"];
$file_size = $_FILES["arquivo"]["size"];
$file_type = $_FILES["arquivo"]["type"];

$arquivo = isset($_FILES["arquivo"]) {
    $_FILES["arquivo"];
} else {
    FALSE;
}

if(!$arquivo) {
    echo "Houve um erro no Upload!";
} else { 
    //copy($file_tmp, "caminho/pasta/$file_name");
    move_uploaded_file($file_tmp,"caminho/pasta/$file_name");
    
    $binario = file_get_contents($file_tmp);
    $binario = mysql_real_escape_string($binario);
    
    $sql = "INSERT INTO `binario`.`arquivos` (`Codigo` ,`NmArquivo` ,`Descricao` , `Arquivo` ,`Tipo` ,`Tamanho` ,`DtHrEnvio`)
    VALUES ('NULL', 'foto.jpg', '$file_name', '$binario', '$file_type', '$file_size', CURRENT_TIMESTAMP)";

    mysql_query("$sql") or die (mysql_error());

}

?>