<?php
session_start();
include("conexion.php");

$id = $_GET['id'];
$nivel = isset($_SESSION['nivel']) ? $_SESSION['nivel'] : 0;

if ($nivel != 1) {
    echo "<p>Usted no tiene permiso para editar este libro.</p>";
    exit;
}

$sql = "SELECT * FROM libros WHERE id=$id";
$res = mysqli_query($conexion, $sql);

if ($row = mysqli_fetch_assoc($res)) {
    echo "<form id='formEditarLibro' enctype='multipart/form-data'>
        <input type='hidden' name='id' value='{$row['id']}'>
        <label>Título: <input name='titulo' value='" . htmlspecialchars($row['titulo']) . "'></label><br><br>
        <label>Autor: <input name='autor' value='" . htmlspecialchars($row['autor']) . "'></label><br><br>
        <label>Año: <input name='anio' value='" . htmlspecialchars($row['anio']) . "'></label><br><br>
        <label>Imagen actual: <strong>{$row['imagen']}</strong></label><br>
        <input type='file' name='imagen'><br><br>
        <label>Editorial ID: <input name='ideditorial' value='{$row['ideditorial']}'></label><br><br>
        <label>Carrera ID: <input name='idcarrera' value='{$row['idcarrera']}'></label><br><br>
        <button type='button' onclick='guardarCambiosLibro()'>Guardar</button>
    </form>";
}
?>
