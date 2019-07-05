<?php
session_start();
unset($_SESSION['InfoUser']);
session_destroy();
// Modificado:
header("Location: login.php");
?>
