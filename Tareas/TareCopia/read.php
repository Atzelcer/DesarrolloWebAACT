<?php
session_start();
require("verificarsesion.php");
include("conexion.php");

$sql = "SELECT personas.id, nombres, apellidos, fecha_nacimiento, sexo, correo, profesiones.nombre AS profesion 
        FROM personas 
        LEFT JOIN profesiones ON personas.profesion_id = profesiones.id";

$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Listado de Personas</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>

  <h1>Lista de Personas</h1>

  <table class="tabla-datos">
    <thead>
      <tr>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Fec. Nacimiento</th>
        <th>Sexo</th>
        <th>Correo</th>
        <th>Profesión</th>
        <?php if ($_SESSION['nivel'] == 1) { ?>
          <th>Operaciones</th>
        <?php } ?>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($resultado)) { ?>
        <tr>
          <td><?php echo htmlspecialchars($row['nombres']); ?></td>
          <td><?php echo htmlspecialchars($row['apellidos']); ?></td>
          <td><?php echo htmlspecialchars($row['fecha_nacimiento']); ?></td>
          <td><?php echo htmlspecialchars($row['sexo']); ?></td>
          <td><?php echo htmlspecialchars($row['correo']); ?></td>
          <td><?php echo htmlspecialchars($row['profesion']); ?></td>
          <?php if ($_SESSION['nivel'] == 1) { ?>
            <td>
              <a class="boton editar" href="formeditar.php?id=<?php echo $row['id']; ?>">Editar</a>
              <a class="boton eliminar" href="delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <?php if ($_SESSION['nivel'] == 1) { ?>
    <a class="boton insertar" href="forminsertar.php">Insertar</a>
  <?php } ?>

  <br><br>
  <a class="boton" href="menu.php">Volver al Menú</a>

</body>
</html>
