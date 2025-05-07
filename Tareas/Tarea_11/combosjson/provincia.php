<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $resultado = $conexion->query("SELECT * FROM provincias WHERE departamento_id = $id ORDER BY nombre");

    $datos = [];
    while ($fila = $resultado->fetch_assoc()) {
        $datos[] = $fila;
    }

    header('Content-Type: application/json');
    echo json_encode($datos);
}
?>
