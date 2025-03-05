<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Suma</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h2>SUMA DE DOS NUMEROS</h2>

    <?php
        echo "<form action='suma.php' method='GET'>";
        echo "<label for='num1'><strong>Numero 1: </strong></label>";
        echo "<input type='number' name='num1' id='num1' required>";
        echo "<br><br>";

        echo "<label for='num2'><strong>Numero 2: </strong></label>";
        echo "<input type='number' name='num2' id='num2' required>";
        echo "<br><br>";

        echo "<button type='submit'>Calcular Suma</button>";
        echo "</form>";
    ?>

</body>
</html>
