<?php
$conexion = new mysqli("localhost", "root", "", "bd_alumnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT a.fotografia, a.nombres, a.apellidos, a.cu, 
               IF(a.sexo = 'M', 'Masculino', 'Femenino') AS sexo,
               c.nombreCarrera 
        FROM alumnos a
        LEFT JOIN carreras c ON a.codigocarrera = c.codigoCarrera";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Alumnos</title>
  <style>
    body {
      font-family: Arial;
      background-color: white;
      padding: 40px;
    }

    .volver {
      text-align: right;
      margin-bottom: 20px;
    }

    .volver a,
    .volver form button {
      padding: 8px 15px;
      background-color: #2c6aa0;
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: bold;
      border: none;
      cursor: pointer;
      margin-left: 10px;
    }

    .volver a:hover,
    .volver form button:hover {
      background-color: #1f4e78;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      border: 2px solid black;
    }

    th, td {
      border: 1px solid black;
      padding: 10px;
      text-align: center;
      vertical-align: middle;
    }

    th {
      background-color: #eee;
    }

    td img {
      width: 60px;
      height: 60px;
      object-fit: cover;
    }

    td:nth-child(3), td:nth-child(4), td:nth-child(5), td:nth-child(6), td:nth-child(7) {
      font-style: italic;
    }
  </style>
</head>
<body>

  <div class="volver">
    <a href="javascript:history.back()">← Volver</a>
  </div>

  <table>
    <tr>
      <th>Nro</th>
      <th>Fotografía</th>
      <th>Nombre</th>
      <th>Apellidos</th>
      <th>CU</th>
      <th>Sexo</th>
      <th>Carrera</th>
    </tr>

    <?php 
    $contador = 1;
    while ($fila = $resultado->fetch_assoc()):
    ?>
    <tr>
      <td><?php echo $contador++; ?></td>
      <td><img src="fotos/<?php echo htmlspecialchars($fila['fotografia']); ?>" alt="Foto"></td>
      <td><em><?php echo htmlspecialchars($fila['nombres']); ?></em></td>
      <td><em><?php echo htmlspecialchars($fila['apellidos']); ?></em></td>
      <td><em><?php echo htmlspecialchars($fila['cu']); ?></em></td>
      <td><strong><?php echo htmlspecialchars($fila['sexo']); ?></strong></td>
      <td><em><?php echo htmlspecialchars($fila['nombreCarrera'] ?? ''); ?></em></td>
    </tr>
    <?php endwhile; ?>
  </table>

</body>
</html>
