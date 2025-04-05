<?php
include 'funciones.php';

if (isset($_GET['n'])) {
  $n = $_GET['n'];
  $resultado = fibonacci($n);
  $suma = $resultado['suma'];
  $serie = $resultado['serie'];
  $cadena = implode(', ', $serie);

  echo "<h1>Serie fibonacci para $n:</h1>";
  echo "<p>$cadena</p>";
  echo "<h2>Sumatoria: $suma</h2>";

  header("refresh:3;url=pregunta2.html");
} else {
  echo "<h2>No se ingreso ningun numero</h2>";
  header("refresh:3;url=pregunta2.html");
}
?>
