<?php
function ordenarPalabras($arreglo) {
    sort($arreglo, SORT_STRING);
    return $arreglo;
}

$palabras = isset($_COOKIE['palabras']) ? explode(',', $_COOKIE['palabras']) : [];
$ordenadas = ordenarPalabras($palabras);
setcookie('palabras_ordenadas', implode(',', $ordenadas), time() + 3600);
header('Location: mostrar.php');
exit;
?>
