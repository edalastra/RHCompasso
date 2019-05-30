<?php

/*$login = $_POST['nome'];
$senha = $_POST["idade"];

print_r($login);
print_r($senha);*/

require_once('../anexos/conexao.php');

$file_tmp = $_FILES["anexo"]["tmp_name"];
$file_name = $_FILES["anexo"]["name"];
$file_size = $_FILES["anexo"]["size"];
$file_type = $_FILES["anexo"]["type"];

/*print_r($file_tmp);
print_r($file_name);
print_r($file_size);
print_r($file_type);*/

if($arquivo = isset($_FILES["anexo"])) {
    $_FILES["anexo"];
} else {
    FALSE;
}

print_r($arquivo);

if(!$arquivo) {
    echo "Houve um erro no Upload!";
} else { 
    echo "Fazendo upload";
    //copy($file_tmp, "caminho/pasta/$file_name");
    move_uploaded_file($file_tmp,"caminho/pasta/$file_name");
    
    $binario = file_get_contents($file_tmp);
    $binario = mysql_real_escape_string($binario);
    
    $sql = "INSERT INTO `binario`.`arquivos` (`Codigo` ,`NmArquivo` ,`Descricao` , `Arquivo` ,`Tipo` ,`Tamanho` ,`DtHrEnvio`)
    VALUES ('NULL', 'foto.jpg', '$file_name', '$binario', '$file_type', '$file_size', CURRENT_TIMESTAMP)";

    mysql_query("$sql") or die (mysql_error());

}

?>