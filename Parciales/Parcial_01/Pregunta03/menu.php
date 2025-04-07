<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include_once("ItemVisual.php");

  $item = $_POST['item'];
  $color = $_POST['color'];
  $color_fondo = $_POST['color_fondo'];
  $imagen = $_FILES['imagen']['name'];

  move_uploaded_file($_FILES['imagen']['tmp_name'], $imagen);

  $obj = new ItemVisual($item, $color, $color_fondo, $imagen);
  $serial = serialize($obj);
  file_put_contents("objeto.txt", $serial);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Menú</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  <div class="contenedor-menu">
    <h2>Opciones para mostrar el objeto</h2>
    <a href="cuadrado.php" class="boton">Cuadrado</a>
    <a href="diagonal.php" class="boton">Diagonal</a>
    <a href="formulario.html" class="volver">← Volver al Formulario</a>
  </div>
</body>
</html>
