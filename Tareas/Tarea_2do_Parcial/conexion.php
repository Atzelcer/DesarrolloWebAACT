<?php
$host = "127.0.0.1";
$usuario = "root";
$pass = "";
$bd = "bd_biblioteca";

$con = new mysqli($host, $usuario, $pass, $bd);
if ($con->connect_errno) {
    die("Error de conexión: " . $con->connect_error);
}
$con->set_charset("utf8mb4");
?>
