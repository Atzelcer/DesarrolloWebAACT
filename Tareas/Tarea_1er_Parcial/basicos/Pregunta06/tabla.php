<?php
if (isset($_GET['f']) && isset($_GET['c'])) {
  $filas = $_GET['f'];
  $columnas = $_GET['c'];

  echo "
  <style>
    table {
      border-collapse: collapse;
      margin: 50px auto;
    }
    td {
    border: 1px solid black;
    padding: 10px 40px 10px 6px;

    text-align: left;
    }
    .encabezado {
      background-color: lightgray;
      font-weight: bold;
    }
  </style>
  ";

  echo "<table>";

  for ($i = 0; $i <= $filas; $i++) {
    echo "<tr>";
    for ($j = 0; $j <= $columnas; $j++) {
      if ($i == 0 && $j == 0) {
        echo "<td class='encabezado'></td>";
      } elseif ($i == 0) {
        echo "<td class='encabezado'>$j</td>";
      } elseif ($j == 0) {
        echo "<td class='encabezado'>$i</td>";
      } else {
        $valor = $i * $j;
        echo "<td>$valor</td>";
      }
    }
    echo "</tr>";
  }

  echo "</table>";
  header("refresh:3;url=formulario-tabla.html");
} else {
  echo "<h1>Faltan datos</h1>";
  header("refresh:3;url=formulario-tabla.html");
}
?>
