<?php
if (!isset($_GET['opcion'])) {
  header("Location: menu.php");
  exit;
}

$opcion = $_GET['opcion'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario <?php echo $opcion; ?></title>
</head>
<body>
  <h1>Formulario <?php echo $opcion; ?></h1>
  <form action="resultado.php" method="GET">
    <input type="hidden" name="accion" value="<?php echo $opcion; ?>">

    <?php if ($opcion == 'Fibonacci') { ?>
      <label for="n">N:</label>
      <input type="number" name="n" required><br>
      <input type="submit" value="Calcular">
    
    <?php } elseif ($opcion == 'Mayor') { ?>
      <label for="a">A:</label>
      <input type="number" name="a" required><br>
      <label for="b">B:</label>
      <input type="number" name="b" required><br>
      <label for="c">C:</label>
      <input type="number" name="c" required><br>
      <input type="submit" value="Calcular">

    <?php } elseif ($opcion == 'Piramide') { ?>
      <label for="cadena">Cadena:</label>
      <input type="text" name="cadena" required><br>
      <input type="submit" value="Mostrar">
    <?php } ?>
  </form>
</body>
</html>
