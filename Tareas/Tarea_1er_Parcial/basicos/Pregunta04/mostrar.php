<?php
if (isset($_GET['nombre']) && isset($_GET['ciudad'])) {
  $nombre = $_GET['nombre'];
  $ciudad = $_GET['ciudad'];
  echo "<h1><b>$nombre</b> vive en <span style='color:red'>$ciudad</span></h1>";
  header("refresh:3;url=formulario-nombre.html");
} else {
  echo "<h1>Faltan datos</h1>";
  header("refresh:3;url=formulario-nombre.html");
}
?>
