<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST["numero"];

    if (ctype_digit($numero)) {

        $digitos = str_split($numero);
        $suma = array_sum($digitos);

        header("Location: mostrar.php?numero=$numero&suma=$suma");
        exit();

    } else {
        echo "El valor ingresado no es valido";
    }

} else {
    header("Location: formulario-solicitud.html");
    exit();
}

?>
