<?php
include("conexion.php");

$sql = "SELECT * FROM departamentos ORDER BY nombre";
$resultado = $conexion->query($sql);

while ($fila = $resultado->fetch_assoc()) {
    echo "<option value='{$fila['id']}'>{$fila['nombre']}</option>" ;
}
?>
