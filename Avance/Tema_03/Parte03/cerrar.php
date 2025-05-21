<?php session_start();
echo "el contador de la sesion es: ".$_SESSION['contador'];
session_destroy();
?>