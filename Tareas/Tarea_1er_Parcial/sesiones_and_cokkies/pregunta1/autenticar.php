<?php
session_start();

if (isset($_POST['user']) && isset($_POST['pass'])) {
  $user = $_POST['user'];
  $pass = $_POST['pass'];

  if ($user == 'admin' && $pass == 'admin') {
    $_SESSION['usuario'] = 'admin';
  } else {
    $_SESSION['usuario'] = 'usuario';
  }

  echo "<h2>Bienvenido: " . $_SESSION['usuario'] . "</h2>";
  echo "<a href='acceso.php'>Ir al menu</a>";
  header("refresh:3;url=acceso.php");
} else {
  echo "<h2>Faltan datos</h2>";
  header("refresh:3;url=login.html");
}
?>
