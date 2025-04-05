<?php
session_start();
include 'conexion.php';

if (isset($_POST['user']) && isset($_POST['pass'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  $sql = "SELECT * FROM usuario WHERE usuario='$user' AND password='$pass'";
  $resultado = $conexion->query($sql);

  if ($resultado->num_rows == 1) {
    $fila = $resultado->fetch_assoc();
    $_SESSION['usuario'] = $fila['usuario'];
    $_SESSION['nivel'] = $fila['nivel'];
    header("Location: productos.php");
  } else {
    echo "<h2>Datos incorrectos</h2>";
    header("refresh:3;url=login.php");
  }
} else {
  echo "<h2>Faltan datos</h2>";
  header("refresh:3;url=login.php");
} 
?>
