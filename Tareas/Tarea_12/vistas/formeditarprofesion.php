<?php
session_start();
include("../configuracion/conexion.php");
require("../seguridad/verificarsesion.php");
require("../seguridad/verificarnivel.php");

$id = $_GET['id'];
$sql = "SELECT id, nombre FROM profesiones WHERE id = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Editar Profesión</title>
  <link rel="stylesheet" href="../publicos/css/estilos.css">
  <style>
    body {
      font-family: sans-serif;
      background-color: #f5f8fa;
    }

    .contenedor {
      max-width: 400px;
      margin: 50px auto;
      padding: 30px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    label {
      font-weight: bold;
      display: block;
      margin-bottom: 5px;
    }

    input[type="text"] {
      width: 100%;
      padding: 8px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .boton {
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px 20px;
      width: 100%;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
    }

    .boton:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <div class="contenedor">
    <h2>Editar Profesión</h2>
    <form action="../controladores/editprofesiones.php" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" name="nombre" value="<?php echo htmlspecialchars($row['nombre']); ?>" required>

      <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
      <input type="submit" class="boton" value="Guardar">
    </form>
  </div>

</body>
</html>
