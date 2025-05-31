<?php
include("conexion.php");

$sql = "SELECT imagen, titulo FROM libros";
$res = mysqli_query($conexion, $sql);

$html = "";

while ($row = mysqli_fetch_array($res)) {
    $img = htmlspecialchars($row['imagen']);
    $titulo = htmlspecialchars($row['titulo']);
    $html .= "<button class='libro-btn' onclick=\"mostrarModal('$img')\">
                <img src='img/$img' width='75' height='100' alt='$titulo' title='$titulo'>
              </button>";
}

echo $html;
?>
