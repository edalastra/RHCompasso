<html>
    <head>
    </head>
    <body>
        <div>           
            <form action="teste.php" method="post"> 								
                    <label >Arquivo</label>
                    <br>	
                    <input name="arquivo" type="file" class="input" /> 
                    <br>
                    <input name="teste2" type="text" class="input" value="teste" /> 
                    <br>	
                    <input type="submit" value="Enviar" /> 
                </form>         
        </div>
    </body>
            <?php

                ///enctype="multipart/form-data"
                $teste = $_POST['arquivo'];
                print_r($teste);

                $teste2 = $_POST['teste2'];
                print_r($teste2);

                /*require_once('../db/conexao.php'); 

                $file_tmp = $_FILES["arquivo"]["tmp_name"];
                $file_name = $_FILES["arquivo"]["name"];
                $file_size = $_FILES["arquivo"]["size"];
                $file_type = $_FILES["arquivo"]["type"];

                if($arquivo = isset($_FILES["arquivo"])) {
                    $_FILES["arquivo"];
                } else {
                    FALSE;
                }

                if(!$arquivo) {
                    echo "Houve um erro no Upload!";
                } else {  
                    move_uploaded_file($file_tmp,"caminho/pasta/$file_name");
                    
                    $binario = file_get_contents($file_tmp);
                    $binario = mysql_real_escape_string($binario);
                    
                    $sql = "INSERT INTO `bancorh`.`anexos` (`Codigo` ,`NmArquivo` ,`Descricao` , `Arquivo` ,`Tipo` ,`Tamanho` ,`DtHrEnvio`)
                    VALUES ('NULL', 'foto.jpg', '$file_name', '$binario', '$file_type', '$file_size', CURRENT_TIMESTAMP)";

                    mysql_query("$sql") or die (mysql_error());
                }*/
            ?>       
           
        </html>