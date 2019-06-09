<?php
$QUERY = "Select * from usuarios where usuario = '$login' and senha = '$senha'";
$executa_query = mysqli_query($link, $QUERY);
$conta_linhas = mysqli_num_rows($executa_query);
?>
