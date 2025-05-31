<?php
include("conexion.php");
$id = $_POST['id'];

$sql = "SELECT nivel FROM usuarios WHERE id = $id";
$res = $con->query($sql);

if ($res->num_rows == 1) {
    $fila = $res->fetch_assoc();
    $nuevo_nivel = ($fila['nivel'] == 0) ? 1 : 0;

    $update = "UPDATE usuarios SET nivel = $nuevo_nivel WHERE id = $id";
    $con->query($update);
    echo "Nivel actualizado correctamente.";
} else {
    echo "Usuario no encontrado.";
}
?>
