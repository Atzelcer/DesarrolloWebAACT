<?php
$conexion = new mysqli("localhost", "root", "", "bd_alumnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Eliminar todo
$conexion->query("DELETE FROM alumnos");

// Redirigir de vuelta a Fdatos.php
header("Location: Fdatos.php");
exit;
?>
