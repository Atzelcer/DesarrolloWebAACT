<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html");
    exit();
}

include("../conexion.php");

$sql = "SELECT id, usuario, nombrecompleto, cu, idcarrera, nivel FROM usuarios";
$resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Usuarios Registrados</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #e0e0e0;
      margin: 0;
      padding: 0;
    }
    h2 {
      text-align: center;
      padding-top: 20px;
      color: #333;
      font-size: 20px;
    }
    table {
      width: 70%;
      margin: 20px auto;
      border-collapse: collapse;
      font-size: 14px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    th {
      background-color: #001f7f;
      color: white;
      padding: 6px 10px;
      font-size: 13px;
    }
    td {
      padding: 8px 10px;
      text-align: center;
    }
    tr:nth-child(even) {
      background-color: #f0f4fa;
    }
    tr:nth-child(odd) {
      background-color: #ffffff;
    }
    a.volver {
      display: block;
      width: fit-content;
      margin: 15px auto;
      text-decoration: none;
      color: red;
      font-weight: bold;
      font-size: 13px;
    }
  </style>
</head>
<body>

<h2>Usuarios Registrados</h2>

<table border="1">
  <tr>
    <th>ID</th>
    <th>Usuario</th>
    <th>Nombre Completo</th>
    <th>CU</th>
    <th>ID Carrera</th>
    <th>Nivel</th>
  </tr>
  <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
    <tr>
      <td><?= $fila['id'] ?></td>
      <td><?= $fila['usuario'] ?></td>
      <td><?= $fila['nombrecompleto'] ?></td>
      <td><?= $fila['cu'] ?></td>
      <td><?= $fila['idcarrera'] ?></td>
      <td><?= $fila['nivel'] ?></td>
    </tr>
  <?php } ?>
</table>

<a class="volver" href="../inicio.php">← Volver</a>

</body>
</html>
