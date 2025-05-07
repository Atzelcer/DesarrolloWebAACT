<?php
include("conexion.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM provincias WHERE departamento_id = $id ORDER BY nombre";
    $resultado = $conexion->query($sql);

    while ($fila = $resultado->fetch_assoc()) {
        echo "<option value='{$fila['id']}'>{$fila['nombre']}</option>";
    }
}
?>
