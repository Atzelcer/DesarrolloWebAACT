<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Opciones de numero</title>
</head>
<body>
  <h1>Ingrese un numero</h1>
  <form method="GET">
    <label for="n">Numero:</label>
    <input type="number" name="n" id="n" min="0" required>
    <input type="submit" value="Mostrar opciones">
  </form>

  <?php
  if (isset($_GET['n'])) {
    $n = $_GET['n'];
    echo "<h2>Opciones:</h2>";
    echo "<a href='fibonacci.php?n=$n'>Calcular fibonacci</a><br>";
    echo "<a href='factorial.php?n=$n'>Calcular factorial</a>";
  }
  ?>
</body>
</html>
