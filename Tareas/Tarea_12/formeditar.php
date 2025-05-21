<?php include("conexion.php"); 
$id = $_GET['id'];
$stmt = $con->prepare("SELECT id,nombres,apellidos,fecha_nacimiento,sexo,correo FROM personas WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$resultado = $stmt->get_result();
$row = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Persona</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>Editar Persona</h2>
    <form action="javascript:editar()" method="post" id="form-editar">
        <label for="nombres">Nombres:</label>
        <input type="text" name="nombres" value="<?php echo htmlspecialchars($row['nombres']); ?>" required>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo htmlspecialchars($row['apellidos']); ?>" required>
        
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" name="fecha_nacimiento" value="<?php echo htmlspecialchars($row['fecha_nacimiento']); ?>" required>
        
        <label>Sexo:</label>
        <div>
            <input type="radio" name="sexo" value="Masculino" id="masculino" <?php echo $row['sexo'] == 'Masculino' ? 'checked' : ''; ?>>
            <label for="masculino">Masculino</label>
            
            <input type="radio" name="sexo" value="Femenino" id="femenino" <?php echo $row['sexo'] == 'Femenino' ? 'checked' : ''; ?>>
            <label for="femenino">Femenino</label>
        </div>
        
        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo htmlspecialchars($row['correo']); ?>" required>
        
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="submit" value="Guardar Cambios">
    </form>
</body>
</html>