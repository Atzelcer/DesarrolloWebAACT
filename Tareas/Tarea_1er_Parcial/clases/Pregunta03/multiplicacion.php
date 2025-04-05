<?php
if (isset($_POST['num'])) {
  $numeros = $_POST['num'];
  $producto = 1;
  foreach ($numeros as $valor) {
    $producto *= $valor;
  }
  echo "<h1>el resultado es.. $producto</h1>";
  header("refresh:3;url=pregunta3.html");
} else {
  echo "<h2>No se recibieron numeros</h2>";
  header("refresh:3;url=pregunta3.html");
}
?>
