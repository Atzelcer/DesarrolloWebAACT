<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Intercalada</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>TABLA EJECUTADA</h2>
    
    <div class="contenedor-tabla">
        <?php
        $filas = $_GET['filas'];
        $columnas = $_GET['columnas'];

        $filas = floor($filas / 3) * 3;

        $textos = ["Viva", "Mi", "Bolivia"];
        $colores = ["rojo", "amarillo", "verde"];

        echo "<table class='tabla-intercalada'>";

        for ($i = 0; $i < $filas; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $columnas; $j++) {
                $index = $i % 3;
                $colorClass = $colores[$index];

                $numero = ($i % 3) + 1;

                if ($j == 0) {
                    echo "<td class='$colorClass negrita'>" . $textos[$index] . "</td>";
                } else {
                    echo "<td class='$colorClass numero'>" . $numero . "</td>";
                }
            }
            echo "</tr>";
        }

        echo "</table>";
        ?>
    </div>

    <br>
    <a href="Principal04.php" class="boton">Regresar</a>
</body>
</html>