<?php
function fibonacci($n) {
  $a = 0;
  $b = 1;
  $serie = array();

  for ($i = 0; $i < $n; $i++) {
    $serie[] = $a;
    $siguiente = $a + $b;
    $a = $b;
    $b = $siguiente;
  }

  return implode(', ', $serie);
}

if (isset($_GET['n'])) {
  $n = $_GET['n'];
  $resultado = fibonacci($n);
  echo "<h1>Fibonacci de $n:</h1>";
  echo "<p>$resultado</p>";
  header("refresh:3;url=formulario-numero.php");
} else {
  echo "<h1>No se ingreso ningun numero</h1>";
  header("refresh:3;url=formulario-numero.php");
}
?>
