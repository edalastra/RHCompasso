   
<?php
require_once('../anexos/conexao.php');

    $file_tmp = $_FILES["anexo"]["tmp_name"];
    $file_name = $_FILES["anexo"]["name"];
    $file_size = $_FILES["anexo"]["size"];
    $file_type = $_FILES["anexo"]["type"];

if($arquivo = isset($_FILES["anexo"])) {
    $_FILES["anexo"];    
} else {
    FALSE;
}

//print_r($file_tmp);

if(!$arquivo) {
    echo "Houve um erro no Upload!";
} else {     
    copy($file_tmp, "C:/xampp/htdocs/$file_name");  
    //move_uploaded_file($file_tmp,"C:/xampp/htdocs/$file_name");
    
    $binario = file_get_contents($file_tmp);
    $binario = mysqli_real_escape_string($conn, $binario);
    
    $sql = "INSERT INTO `binario`.`arquivos` (`Codigo` , `Descricao` , `Arquivo` ,`Tipo` ,`Tamanho` ,`DtHrEnvio`)
    VALUES ('NULL', '$file_name', '$binario', '$file_type', '$file_size', CURRENT_TIMESTAMP)";
    mysqli_query($conn,"$sql") or die (mysqli_error($conn));
    echo "Upload completo com sucesso!";
}
?>