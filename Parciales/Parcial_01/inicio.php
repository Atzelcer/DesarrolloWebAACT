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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inicio</title>
  <link rel="stylesheet" href="css/estilo-inicio.css">
</head>
<body>

  <aside class="menu">
    <img src="imagenes2/Avatar.png" alt="Avatar" class="avatar">
    <h3>Cervantes Torres Atzel Alan</h3>
    <p>111 - 481</p>
    <p>Repositorio: <a href="https://github.com/Atzelcer/DesarrolloWebAACT/tree/main/Parciales/Parcial_01" target="_blank" class="repo">github.com</a></p>
    <hr>
    <ul>
      <li><a href="inicio.php" class="activo"><img src="imagenes2/inicio.png" width="16"> Inicio</a></li>
      <li><a href="pregunta2.html"><img src="imagenes2/clientes.png" width="16"> Clientes</a></li>
      <li><a href="Pregunta03/formulario.html"><img src="imagenes2/items.png" width="16"> Items</a></li>
      <li><a href="Pregunta04/pregunta5.php"><img src="imagenes2/Prestamos.png" width="16"> Prestamos</a></li>
      <li><a href="pregunta05/usuarios.php"><img src="imagenes2/Usuarios.png" width="16"> Usuarios</a></li>
    </ul>
  </aside>

  <main class="contenido">
    <div class="header">
      <div class="derecha">
        <img src="imagenes2/configurar.png" width="20" alt="Configurar">
        <a href="salir.php"><img src="imagenes2/Salir.png" width="20" alt="Salir"></a>
      </div>
      <hr class="separador">
      <div class="izquierda">
        <h2><img src="imagenes2/inicio.png" width="20" alt="Inicio"> Inicio</h2>
        <p>Primer Examen Parcial</p>
      </div>
    </div>

    <div class="botones">
      <a href="pregunta2.html" class="boton-principal">
        <div class="titulo">CLIENTES</div>
        <img src="imagenes2/clientes.png" alt="Clientes">
      </a>
      <a href="Pregunta03/formulario.html" class="boton-principal">
        <div class="titulo">ITEMS</div>
        <img src="imagenes2/items.png" alt="Items">
      </a>
      <a href="Pregunta04/pregunta5.php" class="boton-principal">
        <div class="titulo">PRESTAMOS</div>
        <img src="imagenes2/Prestamos.png" alt="Prestamos">
      </a>
      <a href="pregunta05/usuarios.php" class="boton-principal">
        <div class="titulo">USUARIOS</div>
        <img src="imagenes2/Usuarios.png" alt="Usuarios">
      </a>
    </div>

  </main>

</body>
</html>
