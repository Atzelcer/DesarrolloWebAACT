<?php
if (isset($_GET['n'])) {
  $n = $_GET['n'];
  $dias = array('Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo');
  if ($n >= 1 && $n <= 7) {
    echo "<h1>Dia seleccionado:</h1>";
    echo "<select>";
    for ($i = 0; $i < 7; $i++) {
      if (($i + 1) == $n) {
        echo "<option selected>" . $dias[$i] . "</option>";
      } else {
        echo "<option>" . $dias[$i] . "</option>";
      }
    }
    echo "</select>";
  } else {
    echo "<h1>Numero fuera de rango</h1>";
  }
  header("refresh:3;url=formulario-dia.html");
} else {
  echo "<h1>No se ingreso ningun valor</h1>";
  header("refresh:3;url=formulario-dia.html");
}
?>
