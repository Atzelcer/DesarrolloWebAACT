<?php
$conexion = new mysqli("localhost", "root", "", "bd_banco");
$id = $_GET['id'];
$query = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $conexion->query($query);
$usuario = $resultado->fetch_assoc();
?>

<html>
<head>
  <title>Editar Correo</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
<div class="formulario">
  <p><strong>Nombres y Apellidos:</strong> <?php echo $usuario['nombres'] . " " . $usuario['apellidos']; ?></p>

  <form method="POST" action="actualizar.php">
    <div class="grupo-horizontal">
      <label for="correo">Correo:</label>
      <input type="text" id="correo" name="correo" value="<?php echo $usuario['correo']; ?>">
    </div>

    <input type="hidden" name="id" value="<?php echo $usuario['id']; ?>">
    <button type="submit">Actualizar</button>
  </form>
</div>

</body>
</html>
