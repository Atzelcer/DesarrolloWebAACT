<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] != 1) {
  echo "<h2>Acceso denegado</h2>";
  header("refresh:3;url=productos.php");
  exit;
}

if (isset($_POST['producto']) && isset($_POST['precio']) && isset($_POST['imagen'])) {
  $producto = $_POST['producto'];
  $precio = $_POST['precio'];
  $imagen = $_POST['imagen'];

  $sql = "INSERT INTO producto (producto, precio, imagen) VALUES ('$producto', $precio, '$imagen')";
  $conexion->query($sql);
}

header("Location: productos.php");
?>
