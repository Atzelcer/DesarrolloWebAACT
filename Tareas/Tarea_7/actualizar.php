<?php
$conexion = new mysqli("localhost", "root", "", "bd_banco");
$id = $_POST['id'];
$correo = $_POST['correo'];

$sql = "UPDATE usuarios SET correo='$correo' WHERE id=$id";
$conexion->query($sql);

header("Location: pregunta4.php");
?>
