<?php
include("conexion.php");

$orden = isset($_GET['orden']) && $_GET['orden'] == 'desc' ? 'DESC' : 'ASC';
$nuevoOrden = ($orden == 'ASC') ? 'desc' : 'asc';

$sql = "SELECT l.id, l.imagen, l.titulo, l.autor, l.anio, e.editorial
        FROM libros l
        JOIN editoriales e ON l.ideditorial = e.id
        ORDER BY l.titulo $orden";

$res = $con->query($sql);

// Tabla
echo "<table border='1' cellpadding='10' style='text-align: center; margin: auto'>";
echo "<tr>
        <th>Imagen</th>
        <th>
            <a href='#' onclick=\"ordenarLibros('$nuevoOrden')\">Título</a>
        </th>
        <th>Autor</th>
        <th>Año</th>
        <th>Editorial</th>
      </tr>";

while ($fila = $res->fetch_assoc()) {
    echo "<tr>";
    echo "<td><img src='imagenes/" . $fila['imagen'] . "' width='60'></td>";
    echo "<td>" . $fila['titulo'] . "</td>";
    echo "<td>" . $fila['autor'] . "</td>";
    echo "<td>" . $fila['anio'] . "</td>";
    echo "<td>" . $fila['editorial'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
