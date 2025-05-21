<?php
include("conexion.php");

$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];
$correo = $_POST['correo'];
$id = $_POST['id'];

$stmt = $con->prepare(
    "UPDATE personas 
     SET nombres = ?, apellidos = ?, fecha_nacimiento = ?, sexo = ?, correo = ? 
     WHERE id = ?"
);

$stmt->bind_param("sssssi", $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo, $id);

if ($stmt->execute()) {
    echo "Registro actualizado correctamente.";
} else {
    echo "Error al actualizar: " . $stmt->error;
}

$stmt->close();
$con->close();
?>
