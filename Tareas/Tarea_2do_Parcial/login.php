<?php
session_start();
include("conexion.php");

// Limpiar datos del formulario
$correo = trim($_POST['correo']);
$clave = sha1(trim($_POST['clave'])); // Cifrado SHA1

// Consulta de verificación
$sql = "SELECT * FROM usuarios WHERE usuario = '$correo' AND password = '$clave'";
$res = $con->query($sql);

// Validar resultado
if ($res->num_rows === 1) {
    $usuario = $res->fetch_assoc();
    $_SESSION['usuario'] = $usuario['usuario'];
    $_SESSION['nivel'] = $usuario['nivel'];

    echo json_encode(["success" => true]);
} else {
    echo json_encode([
        "success" => false,
        "mensaje" => "Credenciales incorrectas"
    ]);
}
?>
