<?php
include_once("ItemVisual.php");
$obj = unserialize(file_get_contents("objeto.txt"));
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cuadrado</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="contenedor-cuadrado">
    <?php $obj->mostrarCuadrado(); ?>
    <br><a href="menu.php" class="volver">← Volver</a>
  </div>
</body>
</html>
