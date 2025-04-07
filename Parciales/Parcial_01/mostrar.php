<?php
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$sexo = $_POST['sexo'];
$direccion = $_POST['direccion'];
$celular = $_POST['celular'];
$correo = $_POST['correo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mostrar Datos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      padding: 40px;
    }

    h2 {
      text-align: center;
    }

    .grid-container {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      grid-template-rows: repeat(2, auto);
      gap: 10px;
      margin: auto;
      max-width: 1000px;
      margin-top: 20px;
    }

    .grid-item {
      padding: 15px;
      border-radius: 8px;
      font-weight: bold;
    }

    .item1 { background-color: #D9F5F9; }
    .item2 { background-color: #D9F9E5; }
    .item3 { background-color: #F9F1D9; }
    .item4 { background-color: #F9D9E5; }
    .item5 { background-color: #E5D9F9; }
    .item6 { background-color: #D9E5F9; }

    .volver-btn {
      display: block;
      width: fit-content;
      margin: 30px auto 0;
      text-align: center;
      color: #C60000;
      text-decoration: none;
      font-weight: bold;
      font-size: 14px;
    }

    .volver-btn:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <h2>Datos del Cliente</h2>

  <div class="grid-container">
    <div class="grid-item item1">Nombres: <?php echo $nombres; ?></div>
    <div class="grid-item item2">Apellidos: <?php echo $apellidos; ?></div>
    <div class="grid-item item3">Sexo: <?php echo $sexo; ?></div>
    <div class="grid-item item4">Direccion: <?php echo $direccion; ?></div>
    <div class="grid-item item5">Celular: <?php echo $celular; ?></div>
    <div class="grid-item item6">Correo: <?php echo $correo; ?></div>
  </div>

  <a href="inicio.php" class="volver-btn">← Volver al Inicio</a>

</body>
</html>
