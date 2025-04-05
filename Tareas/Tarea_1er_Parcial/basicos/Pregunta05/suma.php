<?php
if (isset($_GET['n1']) && isset($_GET['n2'])) {
  $a = $_GET['n1'];
  $b = $_GET['n2'];
  $s = $a + $b;
  echo "
  <style>
    table {
      background-color: #28a745;
      color: black;
      font-weight: bold;
      border-collapse: collapse;
      margin: 50px auto;
    }
    td {
      border: 1px solid black;
      padding: 10px 20px;
      text-align: center;
    }
  </style>
  ";
  echo "<table><tr>";
  echo "<td>$a</td><td>+</td><td>$b</td><td>=</td><td>$s</td>";
  echo "</tr></table>";
  header("refresh:3;url=formulario-suma.html");
} else {
  echo "<h1>Faltan datos</h1>";
  header("refresh:3;url=formulario-suma.html");
}
?>
