<?php
session_start();

if ((!isset($_SESSION['usuario'])) || (!isset($_SESSION['logado']))) {
  header("location:user/login.php");
}

$usuário = $_SESSION['usuario'];

?>
