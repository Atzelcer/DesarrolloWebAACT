<?php
session_start();
include("conexion.php");

$sql = "SELECT * FROM libros";
$res = mysqli_query($conexion, $sql);

$html = "<ul>";
while ($row = mysqli_fetch_assoc($res)) {
    $titulo = htmlspecialchars($row['titulo']);
    $id = $row['id'];
    $html .= "<li onclick=\"verLibro($id)\">$titulo</li>";
}
$html .= "</ul>";

echo $html;
?>
