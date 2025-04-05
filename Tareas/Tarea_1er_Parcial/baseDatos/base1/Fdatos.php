<?php
$conexion = new mysqli("localhost", "root", "", "bd_alumnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

$sql = "SELECT codigoCarrera, nombreCarrera FROM carreras";
$resultado = $conexion->query($sql);
$carreras = [];
while ($fila = $resultado->fetch_assoc()) {
    $carreras[$fila['codigoCarrera']] = $fila['nombreCarrera'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Insertar Alumnos</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #ffffff;
      margin: 0;
      padding: 30px;
    }

    .crear-carrera {
      text-align: right;
      margin-bottom: 20px;
    }

    .crear-carrera a {
      text-decoration: none;
      background-color: #2c6aa0;
      color: white;
      padding: 10px 15px;
      border-radius: 6px;
      font-size: 14px;
      font-weight: bold;
    }

    .crear-carrera a:hover {
      background-color: #1e4c78;
    }

    .contenedor {
      background-color: #3b74a3;
      padding: 30px;
      width: 1000px;
      margin: auto;
    }

    table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 10px 12px;
    }

    th {
      color: black;
      font-size: 15px;
      text-align: center;
    }

    td {
      padding: 4px;
      vertical-align: middle;
      color: black;
    }

    input[type="text"],
    select {
      width: 100%;
      padding: 6px;
      font-size: 14px;
      border: 1px solid black;
      background-color: white;
      color: black;
    }

    input[type="file"] {
      border: 1px solid black;
      background-color: white;
      padding: 6px;
      width: 100%;
    }

    .preview {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid #000;
    }

    input[type="radio"] {
      margin-left: 10px;
      margin-right: 6px;
      accent-color: black;
    }

    .botones {
      margin-top: 20px;
    }

    .botones input[type="submit"],
    .botones input[type="reset"] {
      background-color: white;
      color: black;
      padding: 8px 20px;
      font-size: 15px;
      border: 2px solid black;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.3s ease;
      margin-right: 10px;
    }

    .botones input[type="submit"]:hover {
      border-color: green;
      color: green;
      box-shadow: 0 0 6px rgba(0, 128, 0, 0.6);
    }

    .botones input[type="submit"]:active {
      background-color: green;
      color: white;
    }

    .botones input[type="reset"]:hover {
      border-color: red;
      color: red;
      box-shadow: 0 0 6px rgba(255, 0, 0, 0.6);
    }

    .botones input[type="reset"]:active {
      background-color: red;
      color: white;
    }

    .carrera-select {
      padding-left: 8px;
      padding-right: 8px;
      width: 170px;
    }
  </style>
</head>
<body>

<div class="crear-carrera">
  <a href="crearCarreras.php">Crear Carrera</a>
</div>

<div class="contenedor">
  <form action="insertar.php" method="post" enctype="multipart/form-data">
    <table>
      <tr>
        <th>#</th>
        <th>Fotografía</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>CU</th>
        <th>Sexo</th>
        <th>Carrera</th>
      </tr>

      <?php for ($i = 0; $i < $cantidad; $i++): ?>
      <tr>
        <td><strong><?php echo $i + 1; ?></strong></td>
        <td>
          <input type="file" name="foto<?php echo $i; ?>" required>
        </td>
        <td><input type="text" name="nombre<?php echo $i; ?>" required></td>
        <td><input type="text" name="apellido<?php echo $i; ?>" required></td>
        <td><input type="text" name="cu<?php echo $i; ?>" required></td>
        <td>
          <label><input type="radio" name="sexo<?php echo $i; ?>" value="M" required>Masculino</label>
          <label><input type="radio" name="sexo<?php echo $i; ?>" value="F">Femenino</label>
        </td>
        <td>
          <select name="carrera<?php echo $i; ?>" class="carrera-select" required>
            <option value="">-- Seleccione --</option>
            <?php foreach ($carreras as $codigo => $nombre): ?>
              <option value="<?php echo $codigo; ?>"><?php echo $nombre; ?></option>
            <?php endforeach; ?>
          </select>
        </td>
      </tr>
      <?php endfor; ?>
    </table>

    <input type="hidden" name="cantidad" value="<?php echo $cantidad; ?>">

    <div class="botones">
      <input type="submit" value="Insertar">
      <input type="reset" value="Borrar">
    </div>
  </form>
</div>

</body>
</html>
