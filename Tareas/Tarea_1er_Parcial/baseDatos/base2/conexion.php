<?php
$conexion = new mysqli("localhost", "root", "", "bdtienda");

if ($conexion->connect_error) {
  die("Error en la conexion");
}
?>
