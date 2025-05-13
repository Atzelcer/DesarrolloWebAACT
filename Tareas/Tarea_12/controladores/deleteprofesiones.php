<?php
session_start();
include("../configuracion/conexion.php");
require("../seguridad/verificarsesion.php");
require("../seguridad/verificarnivel.php");

$id = $_GET['id'];

$stmt = $con->prepare('DELETE FROM profesiones WHERE id = ?');
$stmt->bind_param("i", $id);

$resultado = $stmt->execute();

$con->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Eliminando...</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="2;url=../vistas/readprofesiones.php">
  <style>
    body {
      font-family: sans-serif;
      background-color: #f8f9fa;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .mensaje {
      background-color: white;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      text-align: center;
      font-size: 18px;
      color: #333;
    }
  </style>
</head>
<body>

  <div class="mensaje">
    <?php echo $resultado ? "Registro Eliminado" : "Error al eliminar la profesión"; ?>
  </div>

</body>
</html>
