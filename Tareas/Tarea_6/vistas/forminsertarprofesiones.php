<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crear Profesión</title>
  <link rel="stylesheet" href="../publicos/css/estilos.css">
  <style>
    body {
      font-family: sans-serif;
      background-color: #f0f2f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .contenedor {
      background-color: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 12px rgba(0,0,0,0.1);
      width: 400px;
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      color: #333;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 8px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .boton {
      width: 100%;
      background-color: #28a745;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .boton:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>

<?php
session_start();
include("../configuracion/conexion.php");
require("../seguridad/verificarsesion.php");
require("../seguridad/verificarnivel.php");
?>

<div class="contenedor">
  <h2>Crear Nueva Profesión</h2>
  <form action="../controladores/createprofesiones.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" required>

    <input type="submit" value="Guardar" class="boton">
  </form>
</div>

</body>
</html>
