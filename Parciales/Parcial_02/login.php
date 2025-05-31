<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$password = sha1($_POST['password']);

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND password='$password'";
$res = mysqli_query($conexion, $sql);

if ($fila = mysqli_fetch_assoc($res)) {
    $_SESSION['nivel'] = $fila['nivel'];
    echo json_encode([
        "success" => true,
        "nombre" => $fila['nombrecompleto'],
        "correo" => $fila['usuario'],
        "nivel" => $fila['nivel']
    ]);
} else {
    echo json_encode(["success" => false]);
}
?>
