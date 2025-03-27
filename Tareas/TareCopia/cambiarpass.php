<?php
session_start();
require("verificarsesion.php");
require("verificarnivel.php");
include("conexion.php");

$id = $_POST['usuario_id'];
$nueva = $_POST['nueva_password'];
$hash = sha1($nueva);

$sql = "UPDATE usuarios SET password='$hash' WHERE id=$id";

if ($con->query($sql)) {
  echo "Contraseña actualizada correctamente.";
} else {
  echo "Error al actualizar la contraseña.";
}

echo '<meta http-equiv="refresh" content="3;url=menu.php">';
?>
