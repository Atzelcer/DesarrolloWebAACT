<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario']) || $_SESSION['nivel'] != 1) {
  echo "<h2>Acceso denegado</h2>";
  header("refresh:3;url=productos.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Usuarios</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

<h2>Lista de usuarios</h2>

<?php
$sql = "SELECT * FROM usuario";
$res = $conexion->query($sql);

echo "<table>";
echo "<tr><th>ID</th><th>Usuario</th><th>Password</th><th>Nivel</th></tr>";

while ($fila = $res->fetch_assoc()) {
  echo "<tr>";
  echo "<td>" . $fila['idusuario'] . "</td>";
  echo "<td>" . $fila['usuario'] . "</td>";
  echo "<td>" . $fila['password'] . "</td>";
  echo "<td>" . ($fila['nivel'] == 1 ? 'admin' : 'usuario') . "</td>";
  echo "</tr>";
}
echo "</table>";
?>

<a href='productos.php'>Volver a productos</a>

</body>
</html>
