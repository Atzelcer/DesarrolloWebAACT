<?php
session_start();
require("../configuracion/conexion.php");

$usuario = $_POST["usuario"] ?? '';
$contrasenia = sha1($_POST["contrasenia"]); // Encriptar

// Buscar por nombre o correo + contraseña
$sql = "SELECT * FROM personas WHERE (nombres=? OR correo=?) AND contrasenia=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("sss", $usuario, $usuario, $contrasenia);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $_SESSION["correo"] = $fila["correo"];
    $_SESSION["nivel"] = 0; // Usuario normal
    echo "Bienvenido " . htmlspecialchars($fila["nombres"]) . ".";
    echo '<meta http-equiv="refresh" content="2;url=../vistas/temasUsuario.php">';
} else {
    echo "Nombre o correo y contraseña no coinciden.";
    echo '<meta http-equiv="refresh" content="3;url=../vistas/formLoginUsuario.html">';
}
?>
