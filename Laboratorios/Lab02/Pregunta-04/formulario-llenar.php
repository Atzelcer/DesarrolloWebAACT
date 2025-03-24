<?php
if (isset($_POST['cantidad'])) {
    $cantidad = (int)$_POST['cantidad'];
    setcookie('cantidad', $cantidad, time() + 3600);
    setcookie('palabras', '', time() - 3600);
    $palabras = [];
} else {
    $cantidad = isset($_COOKIE['cantidad']) ? (int)$_COOKIE['cantidad'] : 0;
    $palabras = isset($_COOKIE['palabras']) ? explode(',', $_COOKIE['palabras']) : [];
}

if (isset($_POST['palabra'])) {
    $nuevaPalabra = trim($_POST['palabra']);
    if ($nuevaPalabra !== '') {
        $palabras[] = $nuevaPalabra;
    }
    setcookie('palabras', implode(',', $palabras), time() + 3600);

    if (count($palabras) >= $cantidad) {
        header('Location: ordenar.php');
        exit;
    }
}

$numeroSiguiente = count($palabras) + 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Formulario de Palabras</title>
</head>
<body style="text-align: center;">
  <h2>Inserte la palabra <?php echo $numeroSiguiente; ?> de <?php echo $cantidad; ?>:</h2>
  <form action="formulario-llenar.php" method="post">
      <input type="text" name="palabra" required autofocus autocomplete="off">
      <button type="submit">Guardar palabra</button>
  </form>
  <div style="margin-top: 20px;">
    <h3>Palabras ingresadas:</h3>
    <ul style="display: inline-block; text-align: left;">
      <?php foreach ($palabras as $index => $palabra): ?>
        <li><?php echo ($index + 1) . '. ' . htmlspecialchars($palabra); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>
