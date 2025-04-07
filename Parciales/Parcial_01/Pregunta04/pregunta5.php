<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Pregunta 5</title>
  <style>
    body {
      background-color: #EDEDED;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      gap: 30px;
    }

    h1 {
      color: navy;
    }

    .btn {
      padding: 15px 30px;
      background-color: #C60000;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 6px;
    }

    .btn:hover {
      background-color: red;
    }
  </style>
</head>
<body>

  <h1>Bienvenido a la Pregunta 5</h1>
  <a href="read.php" class="btn">Ver Tabla de Libros</a>
  <a href="../inicio.php" class="btn">Volver al Inicio</a>

</body>
</html>
