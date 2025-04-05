<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] != 1) {
  echo "<h2>Acceso denegado</h2>";
  header("refresh:3;url=productos.php");
  exit;
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM producto WHERE idproducto = $id";
  $conexion->query($sql);
}

header("Location: productos.php");
?>
