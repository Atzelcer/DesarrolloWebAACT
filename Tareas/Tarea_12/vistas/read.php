<?php
session_start();
require("../seguridad/verificarsesion.php");
include("../configuracion/conexion.php");

$sql = "SELECT personas.id, nombres, apellidos, fecha_nacimiento, sexo, correo, foto, profesiones.nombre AS profesion 
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
  <link rel="stylesheet" href="../publicos/css/estilos.css">
  <style>
    .foto-perfil {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      object-fit: cover;
      border: 2px solid #555;
    }

    .tabla-datos td, .tabla-datos th {
      text-align: center;
    }

    .acciones-superiores {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin: 20px 0;
    }

    .acciones-superiores a {
      padding: 10px 20px;
      text-decoration: none;
      color: white;
      border-radius: 6px;
      font-weight: bold;
    }

    .boton-salir {
      background-color: #6c757d;
    }

    .boton-profesion {
      background-color: #17a2b8;
    }

    .boton-salir:hover,
    .boton-profesion:hover {
      opacity: 0.9;
    }

    .contenedor-insertar {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .boton.insertar {
      background-color: #28a745;
      padding: 10px 30px;
      font-weight: bold;
      text-decoration: none;
      color: white;
      border-radius: 6px;
    }

    .boton.insertar:hover {
      opacity: 0.9;
    }
  </style>
</head>
<body>

  <h1>Lista de Personas</h1>

  <div class="acciones-superiores">
    <a class="boton-salir" href="../Pagina-principal-index.html">Salir</a>

    <?php if ($_SESSION['nivel'] == 1) {?>
      <a class="boton-profesion" href="readprofesiones.php">Profesiones</a>
    <?php } ?>
  </div>

  <table class="tabla-datos">
    <thead>
      <tr>
        <th>Foto</th>
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
          <td>
            <img 
              src="../publicos/<?php echo htmlspecialchars($row['foto']); ?>" 
              alt="foto de perfil" 
              class="foto-perfil">
          </td>
          <td><?php echo htmlspecialchars($row['nombres']); ?></td>
          <td><?php echo htmlspecialchars($row['apellidos']); ?></td>
          <td><?php echo htmlspecialchars($row['fecha_nacimiento']); ?></td>
          <td><?php echo htmlspecialchars($row['sexo']); ?></td>
          <td><?php echo htmlspecialchars($row['correo']); ?></td>
          <td><?php echo $row['profesion'] ? htmlspecialchars($row['profesion']) : "<em>Definir</em>"; ?></td>
          <?php if ($_SESSION['nivel'] == 1) { ?>
            <td>
              <a class="boton editar" href="../vistas/formeditar.php?id=<?php echo $row['id']; ?>">Editar</a>
              <a class="boton eliminar" href="../controladores/delete.php?id=<?php echo $row['id']; ?>">Eliminar</a>
            </td>
          <?php } ?>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <?php if ($_SESSION['nivel'] == 1) { ?>
    <div class="contenedor-insertar">
      <a class="boton insertar" href="../vistas/formCrearUsuario.php">Insertar</a>
    </div>
  <?php } ?>

</body>
</html>
