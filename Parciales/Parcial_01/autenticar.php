<?php
session_start();
include 'conexion.php';

if (isset($_POST['usuario']) && isset($_POST['contrasena'])) {
  $usuario = $_POST['usuario'];
  $contrasena = sha1($_POST['contrasena']);

  $sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$contrasena'";
  $res = $conexion->query($sql);

  if ($res->num_rows == 1) {
    $fila = $res->fetch_assoc();
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['nombre'] = $fila['nombrecompleto'];
    $_SESSION['nivel'] = $fila['nivel'];
    $_SESSION['idcarrera'] = $fila['idcarrera'];
    header("Location: inicio.php");
  } else {
    echo "<h2>Datos incorrectos</h2>";
    header("refresh:3;url=login.html");
  }
} else {
  echo "<h2>Faltan datos</h2>";
  header("refresh:3;url=login.html");
}
?>
