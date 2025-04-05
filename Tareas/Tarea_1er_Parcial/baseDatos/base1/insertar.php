<?php
$conexion = new mysqli("localhost", "root", "", "bd_alumnos");
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$cantidad = isset($_POST['cantidad']) ? intval($_POST['cantidad']) : 0;

for ($i = 0; $i < $cantidad; $i++) {
    $nombre = $_POST["nombre$i"];
    $apellido = $_POST["apellido$i"];
    $cu = $_POST["cu$i"];
    $sexo = $_POST["sexo$i"];
    $carrera = $_POST["carrera$i"];

    $fotoNombre = $_FILES["foto$i"]["name"];
    $fotoTmp = $_FILES["foto$i"]["tmp_name"];
    $fotoDestino = "fotos/" . basename($fotoNombre);

    if (!is_dir("fotos")) {
        mkdir("fotos", 0777, true);
    }

    if (move_uploaded_file($fotoTmp, $fotoDestino)) {
        $sql = "INSERT INTO alumnos (fotografia, nombres, apellidos, cu, sexo, codigocarrera)
                VALUES ('$fotoNombre', '$nombre', '$apellido', '$cu', '$sexo', '$carrera')";
        $conexion->query($sql);
    }
}

header("Location: readTabla.php");
exit;
?>
