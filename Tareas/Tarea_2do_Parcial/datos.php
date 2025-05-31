<?php
header('Content-Type: application/json');
include("conexion.php");

$sql = "SELECT titulo, imagen FROM libros";
$res = $con->query($sql);

$todos = [];
if ($res && $res->num_rows > 0) {
    while ($fila = $res->fetch_assoc()) {
        $todos[] = [
            "titulo" => $fila['titulo'],
            "imagen" => $fila['imagen']
        ];
    }
}

echo json_encode($todos);
?>
