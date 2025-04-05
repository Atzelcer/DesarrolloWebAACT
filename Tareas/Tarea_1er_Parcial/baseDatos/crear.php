<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] != 1) {
  echo "<h2>Acceso denegado</h2>";
  header("refresh:3;url=productos.php");
  exit;
}

echo "<h2>Registrar nuevo producto</h2>";
echo "<form action='guardar.php' method='POST'>";
echo "Producto: <input type='text' name='producto' required><br><br>";
echo "Precio: <input type='number' name='precio' required><br><br>";
echo "Imagen (ruta): <input type='text' name='imagen' required><br><br>";
echo "<input type='submit' value='Guardar'>";
echo "</form>";
echo "<br><a href='productos.php'>Volver a productos</a>";
?>