<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['nivel']) || $_SESSION['nivel'] != 1) {
    echo "No autorizado";
    exit;
}

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$autor = $_POST['autor'];
$anio = $_POST['anio'];
$ideditorial = $_POST['ideditorial'];
$idcarrera = $_POST['idcarrera'];

$imagen = null;

if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
    $nombre = basename($_FILES['imagen']['name']);
    $ruta = "img/" . $nombre;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta)) {
        $imagen = $nombre;
    }
}

if ($imagen) {
    $sql = "UPDATE libros SET titulo='$titulo', autor='$autor', anio=$anio, imagen='$imagen', ideditorial=$ideditorial, idcarrera=$idcarrera WHERE id=$id";
} else {
    $sql = "UPDATE libros SET titulo='$titulo', autor='$autor', anio=$anio, ideditorial=$ideditorial, idcarrera=$idcarrera WHERE id=$id";
}

mysqli_query($conexion, $sql);

echo "OK";
?>
