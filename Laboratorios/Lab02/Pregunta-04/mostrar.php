<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista Ordenada</title>
  <style>
    body {
      text-align: center;
    }
    ol {
      border: 2px solid red;
      background-color: yellow;
      padding: 10px;
      width: 300px;
      margin: 20px auto;
      line-height: 1.5;
      text-align: center;
      list-style-position: inside;
    }
  </style>
</head>
<body>
  <h2>Palabras Ordenadas</h2>
  <?php
  if (isset($_COOKIE['palabras_ordenadas'])) {
      $lista = explode(',', $_COOKIE['palabras_ordenadas']);
      echo "<ol>";
      foreach ($lista as $palabra) {
          echo "<li>" . htmlspecialchars($palabra) . "</li>";
      }
      echo "</ol>";
  } else {
      echo "No se recibieron palabras para mostrar.";
  }
  ?>
</body>
</html>
