<?php
if (isset($_GET['cadena'])) {
  $texto = $_GET['cadena'];
  echo "<h2>Cadena original: $texto</h2>";

  if (strpos($texto, 'SCRIPT') !== false) {
    echo "<h2>tiene la palabra SCRIPT</h2>";
    $nueva = str_replace('SCRIPT', '', $texto);
    echo "<h2>Cadena sin SCRIPT: $nueva</h2>";
  }

  header("refresh:3;url=formulario-cadena.html");
} else {
  echo "<h2>No se ingreso ninguna cadena</h2>";
  header("refresh:3;url=formulario-cadena.html");
}
?>
