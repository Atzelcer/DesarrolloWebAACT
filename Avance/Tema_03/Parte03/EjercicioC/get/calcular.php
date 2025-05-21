<?php
include "operaciones.php";
$a = $_GET["a"];
$b = $_GET["b"];
$c = $_GET["c"];
$op =

operaciones = new Operations($a, $b, $c);
switch(op)
{
    case "sumar":
        echo "La suma de los números es " . $operaciones->Sumar();
        break;
    case "restar":
        echo "La resta de los números es " . $operaciones->Restar();
        break;
    case "multiplicar":
        echo "La multiplicación de los números es " . $operaciones->Multiplicar();
        break;
    case "dividir":
        echo "La división de los números es " . $operaciones->Dividir();
        break;
}
?>