<?php
include("conexion.php");

$resultado = $conexion->query("SELECT * FROM departamentos ORDER BY nombre");
$datos = [];

while ($fila = $resultado->fetch_assoc()) {
    $datos[] = $fila;
}

header('Content-Type: application/json');
echo json_encode($datos);
?>
