<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado</title>
</head>
<body>

    <?php
    if (isset($_GET["numero"]) && isset($_GET["suma"])) {

        $numero = $_GET["numero"];
        $suma = $_GET["suma"];

        $digitos = str_split($numero);


        $expresion = "";
        $cantidad = count($digitos);
        for ($i = 0; $i < $cantidad; $i++) {
            $expresion .= $digitos[$i];
            if ($i < $cantidad - 1) {
                $expresion .= " + ";
            }
        }

        echo "<h2>Resultado</h2>";
        echo "Numero ingresado: $numero<br>";
        echo "Operacion: $expresion = $suma";

    } else {
        echo "No se recibieron datos";
    }
    ?>

</body>
</html>
