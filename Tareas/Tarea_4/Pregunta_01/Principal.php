<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Área</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>CALCULANDO EL AREA DE UN TRIANGULO</h2>

    <?php
    echo "<form action='area.php' method='GET'>";

    echo "<label for='base'><strong>Base: </strong></label>";
    echo "<input type='number' name='b' id='base' required step='any'>";
    echo "<br><br>";

    echo "<label for='altura'><strong>Altura: </strong></label>";
    echo "<input type='number' name='h' id='altura' required step='any'>";
    echo "<br><br>";

    echo "<button type='submit'>Calcular</button>";
    echo "</form>";
    ?>


</body>
</html>
