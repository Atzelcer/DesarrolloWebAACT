<?php
include("../configuracion/conexion.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Recuperar Contraseña</title>
  <link rel="stylesheet" href="../publicos/css/estilos.css">
</head>
<body>
  <h2>Recuperar Contraseña</h2>

  <form action="seguridad/verificarcorreo.php" method="post">
    <label for="correo">Ingrese su correo registrado:</label><br>
    <input type="email" name="correo" required><br><br>
    <input type="submit" value="Verificar">
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Limpieza del input
  $correo = trim(mysqli_real_escape_string($con, $_POST["correo"]));

  // Consulta para verificar existencia del correo
  $sql = "SELECT id FROM usuarios WHERE correo='$correo'";
  $resultado = $con->query($sql);

  if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();
    $id = $row["id"];
    header("Location: vista/formcambiarpass.php?id=$id");
    exit();
  } else {
    echo "<p style='color:red;'>Correo no encontrado</p>";
  }
}

// DEBUG: Mostrar todos los correos registrados
$test = $con->query("SELECT correo FROM usuarios");
echo "<h3>Correos registrados:</h3><ul>";
while ($row = $test->fetch_assoc()) {
  echo "<li>" . $row['correo'] . "</li>";
}
echo "</ul>";
?>

</body>
</html>
