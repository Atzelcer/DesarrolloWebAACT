<?php
session_start();
require("../configuracion/conexion.php");

$nombres = $_POST["nombres"];
$correo = $_POST["correo"];

// Consulta que busca por nombre y correo
$sql = "SELECT * FROM personas WHERE nombres=? AND correo=?";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $nombres, $correo);
$stmt->execute();

$resultado = $stmt->get_result();

if ($resultado->num_rows > 0) {
    $_SESSION["correo"] = $correo;
    $_SESSION["nivel"] = 0; // usuario normal

    echo "Bienvenido usuario";
    echo '<meta http-equiv="refresh" content="2;url=../vistas/temasUsuario.php">';
} else {
    echo "Datos incorrectos. Nombre o correo no coinciden.";
    echo '<meta http-equiv="refresh" content="3;url=../vistas/formLoginUsuario.html">';
}
?>
