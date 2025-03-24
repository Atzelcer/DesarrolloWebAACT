<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $celsius = $_POST["celsius"];
    $fahrenheit = ($celsius * 9 / 5) + 32;
    $kelvin = $celsius + 273.15;

    header("Location: mostrar.php?c=$celsius&f=$fahrenheit&k=$kelvin");
    exit();

} else {
    header("Location: formulario-temperatura.html");
    exit();
}

?>
