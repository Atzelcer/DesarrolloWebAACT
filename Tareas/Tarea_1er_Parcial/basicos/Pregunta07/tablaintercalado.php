<?php
if (isset($_GET['f']) && isset($_GET['c'])) {
  $filas = $_GET['f'];
  $columnas = $_GET['c'];

  echo "
  <style>
    table {
      border-collapse: collapse;
      margin: 100px auto;
    }
    td {
      width: 500px;
      height: 100px;
      border: 1px solid black;
    }
    .rojo {
      background-color: red;
    }
    .amarillo {
      background-color: yellow;
    }
    .verde {
      background-color: green;
    }
  </style>
  ";

  echo "<table>";

  for ($i = 0; $i < $filas; $i++) {
    if ($i % 3 == 0) {
      $clase = "rojo";
    } elseif ($i % 3 == 1) {
      $clase = "amarillo";
    } else {
      $clase = "verde";
    }

    echo "<tr>";
    for ($j = 0; $j < $columnas; $j++) {
      echo "<td class='$clase'></td>";
    }
    echo "</tr>";
  }

  echo "</table>";
  header("refresh:3;url=formulario-intercalado.html");
} else {
  echo "<h1>Faltan datos</h1>";
  header("refresh:3;url=formulario-intercalado.html");
}
?>
