<?php
$conexion = new mysqli("localhost", "root", "", "bd_banco");

// Obtener orden de columna
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'nombres';

// Validar orden (seguridad básica)
$orden_valido = in_array($orden, ['nombres', 'apellidos', 'correo']) ? $orden : 'nombres';

$sql = "SELECT * FROM usuarios ORDER BY $orden_valido";
$resultado = $conexion->query($sql);
?>

<html>
<head>
  <title>Pregunta 4</title>
  <link rel="stylesheet" href="estilos.css">
</head>
<body>
  <table>
    <tr class="encabezado">
      <th><a href="?orden=nombres">Nombres</a></th>
      <th><a href="?orden=apellidos">Apellidos</a></th>
      <th><a href="?orden=correo">Correo</a></th>
    </tr>

    <?php while($fila = $resultado->fetch_assoc()) { ?>
      <tr class="<?php echo ($fila['nombres'] == 'Juan' && $fila['apellidos'] == 'Perez') ? 'destacado' : ''; ?>">
        <td><?php echo $fila['nombres']; ?></td>
        <td><?php echo $fila['apellidos']; ?></td>
        <td>
          <a href="form_editar_correr.php?id=<?php echo $fila['id']; ?>">
            <?php echo $fila['correo']; ?>
          </a>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
