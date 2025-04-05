<?php
function factorial($n) {
  $f = 1;
  for ($i = 1; $i <= $n; $i++) {
    $f *= $i;
  }
  return $f;
}

if (isset($_GET['n'])) {
  $n = $_GET['n'];
  $resultado = factorial($n);
  echo "<h1>Factorial de $n:</h1>";
  echo "<p>$resultado</p>";
  header("refresh:3;url=formulario-numero.php");
} else {
  echo "<h1>No se ingreso ningun numero</h1>";
  header("refresh:3;url=formulario-numero.php");
}
?>
