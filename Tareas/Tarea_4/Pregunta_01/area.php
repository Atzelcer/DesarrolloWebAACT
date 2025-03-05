<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Area_Calculada</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <h2>AREA DE UN TRIANGULO </h2>
    <?php
        $base = $_GET['b'];
        $altura = $_GET['h'];
        $area = ($base * $altura) / 2;

        echo "<div class='resultado'>";
        echo "<h3>Resultado:</h3>";

        echo "<table border='1' class='tabla-valores'>";
        echo "<tr><th colspan='2'>Valores Ingresados</th></tr>";
        echo "<tr><td><strong>Base:</strong></td><td>$base</td></tr>";
        echo "<tr><td><strong>Altura:</strong></td><td>$altura</td></tr>";
        echo "</table>";

        echo "<p>Formula: <strong>A = (b × h) / 2</strong></p>";
        echo "<p>Reemplazando: <strong>A = ($base × $altura) / 2</strong></p>";

        echo "<div class='area-recuadro'>";
        echo "<p>Area del triángulo: <strong>$area</strong></p>";
        echo "</div>";
        echo "</div>";
    ?>
    <br>

    <a href="Principal.php"><button>Regresar</button></a>

</body>
</html>