<?php
include_once(__DIR__ . "/../db/conexion.php");

$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$anio = $_POST['anio'];
$ideditorial = $_POST['ideditorial'];
$idusuario = $_POST['idusuario'];
$idcarrera = $_POST['idcarrera'];

if ($_FILES['imagen']['error'] === 0) {
    $nombreImagen = basename($_FILES['imagen']['name']);
    $rutaDestino = "../../imagenes/" . $nombreImagen;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], __DIR__ . "/../../imagenes/" . $nombreImagen)) {
        $sql = "INSERT INTO libros (imagen, titulo, autor, ideditorial, anio, idusuario, idcarrera)
                VALUES ('$nombreImagen', '$titulo', '$autor', $ideditorial, $anio, $idusuario, $idcarrera)";

        if (mysqli_query($conexion, $sql)) {
            echo "ok";
        } else {
            echo "Error al insertar: " . mysqli_error($conexion);
        }
    } else {
        echo "Error al subir la imagen";
    }
} else {
    echo "Error en la imagen";
}
?>
