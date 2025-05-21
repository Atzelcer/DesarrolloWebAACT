<?php
include("conexion.php");

$id = $_GET['id'];
$sql = "SELECT id, nombres, apellidos, fecha_nacimiento, sexo, correo FROM personas WHERE id = $id";
$resultado = $con->query($sql);
$row = $resultado->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
</head>
<body>
    <form id="form-editar" action="javascript:editar()" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" id="nombres" value="<?php echo htmlspecialchars($row['nombres']); ?>" required>
        <br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" id="apellidos" value="<?php echo htmlspecialchars($row['apellidos']); ?>" required>
        <br>

        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>" required>
        <br>

        <label>Sexo:</label>
        <input type="radio" name="sexo" id="masculino" value="Masculino" <?php if ($row['sexo'] == 'Masculino') echo 'checked'; ?>>
        <label for="masculino">Masculino</label>
        <input type="radio" name="sexo" id="femenino" value="Femenino" <?php if ($row['sexo'] == 'Femenino') echo 'checked'; ?>>
        <label for="femenino">Femenino</label>
        <br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" value="<?php echo htmlspecialchars($row['correo']); ?>" required>
        <br>

        <input type="submit" value="Guardar">
    </form>
</body>
</html>
