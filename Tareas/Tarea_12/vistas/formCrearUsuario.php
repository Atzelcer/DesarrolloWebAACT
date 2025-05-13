<?php
require("../configuracion/conexion.php");
$sql = "SELECT id, nombre FROM profesiones";
$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Registrar Nuevo Usuario</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../publicos/css/style-login.css">
  <style>
    .contenedor-formulario {
      max-width: 500px;
      margin: 30px auto;
      background: white;
      padding: 20px;
      border-radius: 8px;
    }

    .titulo-centrado {
      text-align: center;
      font-size: 24px;
      font-weight: bold;
    }

    .preview-imagen {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      border: 3px solid #444;
      display: block;
      margin: 10px auto;
      cursor: pointer;
    }

    #activar-panel {
      display: none;
    }

    .panel-imagenes {
      display: none;
      margin-bottom: 20px;
    }

    #activar-panel:checked ~ .panel-imagenes {
      display: block;
    }

    .galeria-predefinida {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 10px;
      margin-top: 10px;
    }

    .galeria-predefinida label {
      text-align: center;
      display: block;
    }

    .galeria-predefinida img {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      border: 2px solid #ccc;
    }

    .botones-finales {
      text-align: center;
      margin-top: 20px;
    }

    .boton-volver {
      margin-left: 10px;
      text-decoration: none;
      padding: 8px 16px;
      background: #666;
      color: white;
      border-radius: 4px;
    }
  </style>
</head>
<body>

<div class="contenedor-formulario">
  <form action="../controladores/createUsuario.php" method="POST" enctype="multipart/form-data">
    <h2 class="titulo-centrado">Registrar Nuevo Usuario</h2>

    <input type="checkbox" id="activar-panel" hidden>
    <label for="activar-panel" class="imagen-perfil">
      <img src="../publicos/imagenes/logos/default-masculino.png" alt="Imagen de perfil" class="preview-imagen" id="imagenActual">
    </label>

    <div class="panel-imagenes">
      <label for="imagen_personal">Subir imagen personalizada:</label>
      <input type="file" name="imagen_personal" id="imagen_personal" accept="image/*" onchange="document.getElementById('activar-panel').checked = false">

      <div class="galeria-predefinida">
        <?php for ($i = 1; $i <= 11; $i++) { ?>
        <label>
          <input type="radio" name="imagen_predefinida" value="one<?php echo $i; ?>.png"
            onclick="document.getElementById('imagenActual').src='../publicos/imagenes/logos/one<?php echo $i; ?>.png'; document.getElementById('activar-panel').checked = false">
          <img src="../publicos/imagenes/logos/one<?php echo $i; ?>.png">
        </label>
        <?php } ?>
      </div>
    </div>

    <label>Nombres:</label>
    <input type="text" name="nombres" required>

    <label>Apellidos:</label>
    <input type="text" name="apellidos" required>

    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>

    <label>Sexo:</label>
    <label><input type="radio" name="sexo" value="Masculino" required> Masculino</label>
    <label><input type="radio" name="sexo" value="Femenino"> Femenino</label>

    <label>Correo:</label>
    <input type="email" name="correo" required>

    <label>Profesión:</label>
    <details>
      <summary>Seleccionar profesión</summary>
      <div style="margin-top: 8px">
        <?php while ($fila = $resultado->fetch_assoc()) { ?>
          <label>
            <input type="radio" name="profesion_id" value="<?php echo $fila['id']; ?>" required>
            <?php echo htmlspecialchars($fila['nombre']); ?>
          </label><br>
        <?php } ?>
      </div>
    </details>

    <label>Contraseña:</label>
    <input type="password" name="contrasenia" required>

    <div class="botones-finales">
      <button type="submit">Registrar</button>
      <a href="../Pagina-principal-index.html" class="boton-volver">Volver</a>
    </div>
  </form>
</div>

</body>
</html>
