<?php
if (isset($_GET['b']) && isset($_GET['h'])) {
  $b = $_GET['b'];
  $h = $_GET['h'];
  $area = ($b * $h) / 2;
  echo "<h1>El área del triangulo es: $area unidades cuadradas.</h1>";
  header("refresh:3;url=formulario-area.html");
} else {
  echo "<h1>Faltan datos.</h1>";
  header("refresh:3;url=formulario-area.html");
}
?>
