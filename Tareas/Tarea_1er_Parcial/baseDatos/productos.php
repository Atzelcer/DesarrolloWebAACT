<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
  echo "<h2>Acceso denegado</h2>";
  header("refresh:3;url=login.php");
  exit;
}

$usuario = $_SESSION['usuario'];
$nivel = $_SESSION['nivel'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Productos</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>

<h2>usuario: <?php echo $usuario; ?> | tipo: <?php echo $nivel == 1 ? 'administrador' : 'usuario'; ?></h2>

<?php
if ($nivel == 1) {
  echo "<a href='verusuarios.php'>Ver tabla usuarios</a><br><br>";
}

$sql = "SELECT * FROM producto";
$resultado = $conexion->query($sql);

echo "<table>";
echo "<tr><th>Imagen</th><th>Producto</th><th>Precio</th>";
if ($nivel == 1) {
  echo "<th>Acciones</th>";
}
echo "</tr>";

while ($fila = $resultado->fetch_assoc()) {
  echo "<tr>";
  echo "<td><img src='" . $fila['imagen'] . "'></td>";
  echo "<td>" . $fila['producto'] . "</td>";
  echo "<td>" . $fila['precio'] . "</td>";

  if ($nivel == 1) {
    echo "<td>";
    echo "<a href='editar.php?id=" . $fila['idproducto'] . "'>editar</a> | ";
    echo "<a href='eliminar.php?id=" . $fila['idproducto'] . "'>eliminar</a>";
    echo "</td>";
  }

  echo "</tr>";
}
echo "</table>";
?>
<?php
if ($nivel == 1) {
  echo "<br><a href='crear.php'>Registrar nuevo producto</a><br><br>";
}
?>
<a href='salir.php'>Salir</a>


</body>
</html>
