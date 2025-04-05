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
  $sql = "SELECT * FROM producto WHERE idproducto = $id";
  $res = $conexion->query($sql);

  if ($res->num_rows == 1) {
    $fila = $res->fetch_assoc();
    echo "<h2>Editar producto</h2>";
    echo "<form action='actualizar.php' method='POST'>";
    echo "<input type='hidden' name='id' value='" . $fila['idproducto'] . "'><br>";
    echo "Producto: <input type='text' name='producto' value='" . $fila['producto'] . "'><br><br>";
    echo "Precio: <input type='number' name='precio' value='" . $fila['precio'] . "'><br><br>";
    echo "Imagen: <input type='text' name='imagen' value='" . $fila['imagen'] . "'><br><br>";
    echo "<input type='submit' value='Actualizar'>";
    echo "</form>";
  }
} else {
  header("Location: productos.php");
}
?>
