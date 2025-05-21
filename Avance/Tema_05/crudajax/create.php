<?php
include("conexion.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];
$profesion_id = isset($_POST['profesion_id']) ? intval($_POST['profesion_id']) : 0;

$stmt = $con->prepare(
    "INSERT INTO personas(nombres, apellidos, fecha_nacimiento, sexo, correo, profesion_id) 
     VALUES (?, ?, ?, ?, ?, ?)"
);

$stmt->bind_param("sssssi", $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo, $profesion_id);

if ($stmt->execute()) {
    echo "Nuevo registro creado con exito.";
} else {
    echo "Error al insertar: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
