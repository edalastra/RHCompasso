<?php
session_start();
$login = $_POST['usuario'];
$senha = $_POST['senha'];

require_once('../../db/mySQL.php');
require_once('../../db/autenticacao.php');

if ($conta_linhas == 0) {
  // Talvez dê problema:
  
  header("Location: login.php?erro=fail");

} else {
  $_SESSION["usuario"] = $login;
  $_SESSION["senha"] = $senha;
  $_SESSION["logado"] = "sim";

  //header("location:../login/index.php?erro=3");
  //header("refresh: 5", "location:../../telas/menuPrincipal.php");
  header("location:../../telas/menuPrincipal.php");
}

mysqli_close($link);
?>