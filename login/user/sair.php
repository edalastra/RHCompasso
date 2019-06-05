<?php
session_start();
unset($_SESSION['usuario'], $_SESSION['senha']);
$permissão = 'false';
session_destroy();
// Modificado:
header("Location: login.php");
?>
