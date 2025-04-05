<?php
session_start();

if (!isset($_SESSION['usuario'])) {
  echo "<h2>Sesion no iniciada</h2>";
  header("refresh:3;url=login.html");
  exit;
}

$usuario = $_SESSION['usuario'];

echo "<h1>Usuario: $usuario</h1>";

if ($usuario == 'admin') {
  echo "<ul>
          <li><a href='#'>crear</a></li>
          <li><a href='#'>listar</a></li>
          <li><a href='#'>borrar</a></li>
          <li><a href='login.html'>salir</a></li>
        </ul>";
} else {
  echo "<ul>
          <li><a href='#'>listar</a></li>
        </ul>";
}
?>
