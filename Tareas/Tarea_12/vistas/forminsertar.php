<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insertar Persona</title>
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
      margin-top: 15px;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="date"] {
      width: 100%;
      padding: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    .sexo-opciones {
      margin-top: 10px;
      display: flex;
      gap: 10px;
    }

    .boton {
      margin-top: 25px;
      width: 100%;
      background-color: #007bff;
      color: white;
      border: none;
      padding: 10px;
      border-radius: 5px;
      font-weight: bold;
      cursor: pointer;
    }

    .boton:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

<?php
session_start();
require("../seguridad/verificarsesion.php");
require("../seguridad/verificarnivel.php");
?>

<div class="contenedor">
  <h2>Insertar Persona</h2>
  <form action="../controladores/create.php" method="post">

    <label for="nombres">Nombres:</label>
    <input type="text" name="nombres" required>

    <label for="apellidos">Apellidos:</label>
    <input type="text" name="apellidos" required>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>

    <label for="sexo">Sexo:</label>
    <div class="sexo-opciones">
      <label><input type="radio" name="sexo" value="Masculino" required> Masculino</label>
      <label><input type="radio" name="sexo" value="Femenino"> Femenino</label>
    </div>

    <label for="correo">Correo:</label>
    <input type="email" name="correo" required>

    <input type="submit" value="Guardar" class="boton">
  </form>
</div>

</body>
</html>
