<?php 
session_start();
require("../seguridad/verificarsesion.php");
include("../configuracion/conexion.php");

$sql = "SELECT id, nombre FROM profesiones";
$resultado = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Lista de Profesiones</title>
  <link rel="stylesheet" href="../publicos/css/estilos.css">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f3f6f9;
      padding: 20px;
      text-align: center;
    }

    h1 {
      color: #2c3e50;
    }

    table {
      margin: 20px auto;
      width: 50%;
      border-collapse: collapse;
      background: white;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }

    th, td {
      padding: 12px;
      border: 1px solid #ccc;
      text-align: center;
    }

    th {
      background-color: #2c3e50;
      color: white;
    }

    a.boton {
      display: inline-block;
      margin: 20px 10px;
      padding: 10px 20px;
      border-radius: 6px;
      font-weight: bold;
      text-decoration: none;
      color: white;
    }

    .crear {
      background-color: #28a745;
    }

    .volver {
      background-color: #6c757d;
    }

    .editar {
      background-color: #007bff;
      padding: 6px 12px;
    }

    .eliminar {
      background-color: #dc3545;
      padding: 6px 12px;
    }

    .editar, .eliminar {
      color: white;
      text-decoration: none;
      border-radius: 4px;
      margin: 0 5px;
    }
  </style>
</head>
<body>

<h1>Lista de Profesiones</h1>

<table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <?php if ($_SESSION['nivel'] == 1) { ?>
        <th>Operaciones</th>
      <?php } ?>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $resultado->fetch_assoc()) { ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo htmlspecialchars($row['nombre']); ?></td>
        <?php if ($_SESSION['nivel'] == 1) { ?>
        <td>
          <a class="editar" href="../vistas/formeditarprofesion.php?id=<?php echo $row['id']; ?>">Editar</a>
          <a class="eliminar" href="../controladores/deleteprofesiones.php?id=<?php echo $row['id']; ?>">Eliminar</a>
        </td>
        <?php } ?>
      </tr>
    <?php } ?>
  </tbody>
</table>

<?php if ($_SESSION['nivel'] == 1) { ?>
  <a class="boton crear" href="../vistas/forminsertarprofesiones.php">Crear Profesión</a>
<?php } ?>
<a class="boton volver" href="read.php">Volver</a>

</body>
</html>
