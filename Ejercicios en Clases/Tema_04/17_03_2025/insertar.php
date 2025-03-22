<?php include('conexion.php');

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : '';
$fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : '';
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';

// $con->prepare("INSERT INTO personas (nombre, apellidos, fecha_nacimiento, sexo, correo) VALUES ('$nombre','$apellidos', ?, ?, ?)");
//con Prepare es la forma segura de insertar datos .. a los valores de la tabla ... tomarlo en cuenta y analizarlo .... para su mejor uso .. 

$stmt = $con->prepare("INSERT INTO personas (nombre, apellidos, fecha_nacimiento, sexo, correo) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombre, $apellidos, $fecha_nacimiento, $sexo, $correo);
$stmt->execute();

?>

<meta http-equiv="refresh" content="0; url=read.php">
<h1>Registro insertado correctamente</h1>