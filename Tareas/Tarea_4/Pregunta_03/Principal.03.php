<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Tabla</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h2>GENERAR TABLA DE MULTIPLICACION</h2>

    <?php
        echo "<form action='tabla.php' method='GET'>";
        echo "<label for='columnas'><strong>Numero de Columnas: </strong></label>";
        echo "<input type='number' name='columnas' id='columnas' required min='1'>";
        echo "<br><br>";

        echo "<label for='filas'><strong>Numero de Filas: </strong></label>";
        echo "<input type='number' name='filas' id='filas' required min='1'>";
        echo "<br><br>";

        echo "<button type='submit'>Generar Tabla</button>";
        echo "</form>";
    ?>

</body>
</html>
