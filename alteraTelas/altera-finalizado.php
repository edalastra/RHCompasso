<?php
session_start();
    include("../db/conexao.php");
    include("../update.php");


    if (!isset ($id)){
     $id = $_SESSION['id'];
    }

?>
<?php

$ID_USUARIO = $id;
$STATUS = 'FINALIZADO';


if(status($conn, $ID_USUARIO, $STATUS)){
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
    
    header("Refresh:1; url=../telas/menuPrincipal.php");
    ?>