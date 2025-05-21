<?php include("pila.php");

$pila = new Pila();
$pila->insertar(elementos:1);
$pila->insertar(elementos:2);
$pila->insertar(elementos:3);
$pila->insertar(elementos:4);
$pila->insertar(elementos:5);


$pila->mostrar();
echo "<br>";echo "<hr>";
$pila->eliminar()."<br>";
$pila->mostrar();
echo "<br>";echo "<hr>";
$pila->eliminar()."<br>";
$pila->mostrar();
?>