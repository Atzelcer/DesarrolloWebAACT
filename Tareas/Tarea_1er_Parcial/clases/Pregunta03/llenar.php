<?php
if (isset($_POST['n'])) {
  $n = $_POST['n'];
  echo "<h1>Ingrese $n numeros</h1>";
  echo "<form action='multiplicacion.php' method='POST'>";
  for ($i = 0; $i < $n; $i++) {
    echo "<input type='number' name='num[]' required><br><br>";
  }
  echo "<input type='submit' value='calcular'>";
  echo "</form>";
} else {
  header("Location: pregunta3.html");
}
?>
