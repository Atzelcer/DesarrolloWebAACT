<?php
if (isset($_GET['num'])) {
  $n = $_GET['num'];
  if ($n % 2 == 0) {
    echo "<h1>El numero $n es par</h1>";
  } else {
    echo "<h1>El numero $n es impar</h1>";
  }
  header("refresh:3;url=formulario-parimpar.html");
} else {
  echo "<h1>No se ingreso ningun valor</h1>";
  header("refresh:3;url=formulario-parimpar.html");
}
?>
