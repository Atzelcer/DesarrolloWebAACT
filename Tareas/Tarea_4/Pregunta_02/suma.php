<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Suma</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h2>RESULTADO</h2>

    <?php
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $suma = $num1 + $num2;

    echo "<table class='tabla-suma'>";
    echo "<tr>";
    echo "<td class='verde'>$num1</td>";
    echo "<td class='blanco'> + </td>";
    echo "<td class='verde'>$num2</td>";
    echo "<td class='blanco'> = </td>";
    echo "<td class='verde'>$suma</td>";
    echo "</tr>";
    echo "</table>";
    ?>

    <br>
    <a href="Principal02.php" class="boton">Regresar</a>

</body>
</html>
