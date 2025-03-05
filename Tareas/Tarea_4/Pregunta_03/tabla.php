<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Generada</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h2>TABLA DE MULTIPLICACION</h2>

    <?php
        $filas = $_GET['filas'] + 1; 
        $columnas = $_GET['columnas'] + 1; 

        echo "<table class='tabla-multiplicacion'>";

        for ($i = 0; $i < $filas; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $columnas; $j++) {
                if ($i == 0 && $j == 0) {
                    echo "<td class='vacio'></td>"; 
                } elseif ($i == 0) {
                    echo "<td class='encabezado'>$j</td>"; 
                } elseif ($j == 0) {
                    echo "<td class='fila'>$i</td>"; 
                } else {
                    echo "<td class='celda'>" . ($i * $j) . "</td>"; 
                }
            }
            echo "</tr>";
        }

        echo "</table>";
    ?>

    <br>
    <a href="Principal.03.php" class="boton">Regresar</a>

</body>
</html>
