<?php
include_once(__DIR__ . "/../db/conexion.php");

$sql = "SELECT imagen, titulo, autor, anio, ideditorial FROM libros";
$resultado = mysqli_query($conexion, $sql);

$html = '<table style="width: 100%; border-spacing: 20px; text-align: center;">';
$col = 0;

while ($fila = mysqli_fetch_assoc($resultado)) {
    if ($col % 3 === 0) {
        $html .= '<tr>';
    }

    $img = htmlspecialchars($fila['imagen']);
    $titulo = htmlspecialchars($fila['titulo'], ENT_QUOTES);
    $autor = htmlspecialchars($fila['autor'], ENT_QUOTES);
    $anio = htmlspecialchars($fila['anio']);
    $editorial = htmlspecialchars($fila['ideditorial']);
    $ruta = "../../imagenes/" . $img;

    $html .= '
        <td>
            <div class="libro-card"
                 data-imagen="' . $ruta . '"
                 data-titulo="' . $titulo . '"
                 data-autor="' . $autor . '"
                 data-anio="' . $anio . '"
                 data-editorial="' . $editorial . '"
                 style="display: flex; flex-direction: column; align-items: center; cursor: pointer;">
                 
                <div style="width: 50px; height: 75px;
                            background-image: url(\'' . $ruta . '\');
                            background-size: cover;
                            background-position: center;
                            border: none;">
                </div>
                <span style="margin-top: 8px; font-size: 13px; color: #333; max-width: 80px; word-wrap: break-word;">
                    ' . $titulo . '
                </span>
            </div>
        </td>';

    $col++;
    if ($col % 3 === 0) {
        $html .= '</tr>';
    }
}
if ($col % 3 !== 0) {
    $html .= '</tr>';
}
$html .= '</table>';

echo $html;
?>
