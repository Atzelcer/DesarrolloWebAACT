<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "bd_bolivia_dpm";
$sql_respaldo = __DIR__ . "/../bd_bolivia_dpm.sql"; 

$conexion = new mysqli($host, $user, $pass);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

if (!$conexion->select_db($db)) {
    if ($conexion->query("CREATE DATABASE $db")) {
        $conexion->select_db($db);
        if (file_exists($sql_respaldo)) {
            $sql = file_get_contents($sql_respaldo);
            if ($conexion->multi_query($sql)) {
                do {
                    $conexion->next_result();
                } while ($conexion->more_results());
            } else {
                die("Error al importar respaldo: " . $conexion->error);
            }
        } else {
            die("No se encontró el archivo de respaldo: $sql_respaldo");
        }
    } else {
        die("Error al crear la base de datos: " . $conexion->error);
    }
}

$conexion->set_charset("utf8");
?>
