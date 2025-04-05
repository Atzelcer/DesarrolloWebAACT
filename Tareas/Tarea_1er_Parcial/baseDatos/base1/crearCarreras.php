<?php
$conexion = new mysqli("localhost", "root", "", "bd_alumnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Insertar carrera nueva
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nombre"])) {
    $nombre = $conexion->real_escape_string($_POST["nombre"]);
    $conexion->query("INSERT INTO carreras (nombreCarrera) VALUES ('$nombre')");
}

// Obtener todas las carreras
$resultado = $conexion->query("SELECT codigoCarrera, nombreCarrera FROM carreras");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Carreras</title>
    <style>
        body {
            background: #e9e9e9;
            font-family: Arial;
        }

        .contenedor {
            width: 90%;
            margin: 50px auto;
            display: flex;
            justify-content: space-between;
        }

        .tabla-carreras, .formulario {
            background-color: white;
            padding: 20px;
            border-radius: 12px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
        }

        .tabla-carreras {
            width: 60%;
        }

        .formulario {
            width: 35%;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border-bottom: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background: #2c6aa0;
            color: white;
        }

        input[type="text"] {
            width: 90%;
            padding: 8px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #2c6aa0;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1f4e78;
        }

        .volver {
            text-align: right;
            margin: 20px;
        }

        .volver a {
            padding: 8px 15px;
            background-color: #2c6aa0;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .volver a:hover {
            background-color: #1f4e78;
        }
    </style>
</head>
<body>

<div class="volver">
    <a href="javascript:history.back()">Volver</a>
</div>

<div class="contenedor">
    <div class="tabla-carreras">
        <h2>Lista de Carreras</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre de la carrera</th>
            </tr>
            <?php while ($fila = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $fila["codigoCarrera"]; ?></td>
                    <td><?php echo $fila["nombreCarrera"]; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>

    <div class="formulario">
        <h2>Crear nueva carrera</h2>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre de la carrera" required>
            <input type="submit" value="Crear">
        </form>
    </div>
</div>

</body>
</html>
