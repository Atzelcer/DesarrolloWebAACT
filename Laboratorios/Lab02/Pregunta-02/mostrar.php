<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta - 02 - Mostrar Resultados </title>

    <style>
        table{
            border: 2px solid green;
            background-color: white;
            padding: 10px;
            margin-top: 20px;
        }
        td{
            padding: 8px 20px;
        }

    </style>
</head>
<body>
    <?php 
    if(isset($_GET["c"]) && isset($_GET["f"]) && isset($_GET["k"])){
        $c = $_GET["c"];
        $f = $_GET["f"];
        $k = $_GET["k"];

        echo "<h2>Conversion de Temperaturas </h2>";

        echo "<table border='2' cellpadding='10' style='border-color:green; background-color:white'>";
        echo "<tr><td>Temperatura en Celcius</td><td>".$c."</td></tr>";
        echo "<tr><td>Temperatura en Fahrenheit</td><td>".$f."</td></tr>";
        echo "<tr><td>Temperatura en Kelvin</td><td>".$k."</td></tr>";
        echo "</table>";
    } else {
        echo "NO se recibieron datos para mostrar";
    }
    ?>

</body>
</html>