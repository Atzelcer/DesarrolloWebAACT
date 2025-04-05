<?php
include 'utiles.php';

if (isset($_GET['cadena']) && isset($_GET['n'])) {
  $cadena = $_GET['cadena'];
  $n = $_GET['n'];

  $obj = new Utiles($cadena);
  echo "<h1>Resultado:</h1>";
  $obj->aumentarguiones($n);

  header("refresh:3;url=pregunta4.html");
} else {
  echo "<h2>Faltan datos</h2>";
  header("refresh:3;url=pregunta4.html");
}
?>
