<?php
session_start();
include("../configuracion/conexion.php");
require("../seguridad/verificarsesion.php");
require("../seguridad/verificarnivel.php");

$sql = "SELECT id, correo FROM usuarios";
$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Cambiar Contraseña</title>
  <link rel="stylesheet" href="../publicos/css/estilos.css">
</head>
<body>
  <h1>Cambiar Contraseña de Usuario</h1>

  <form action="../vistas/cambiarpass.php" method="post">
    <label for="usuario_id">Selecciona un usuario:</label><br>
    <select name="usuario_id" required>
      <?php while($row = mysqli_fetch_array($resultado)) { ?>
        <option value="<?php echo $row['id']; ?>"><?php echo $row['correo']; ?></option>
      <?php } ?>
    </select><br><br>

    <label for="nueva_password">Nueva contraseña:</label><br>
    <input type="password" name="nueva_password" required><br><br>

    <input type="submit" value="Actualizar Contraseña">
  </form>

  <br>
  <a class="boton" href="menu.php">Volver al Menú</a>
</body>
</html>
