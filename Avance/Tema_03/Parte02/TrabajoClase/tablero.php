<?php
$filas = isset($_GET['numerofilas']) ? intval($_GET['numerofilas']) : 8;
$columnas = isset($_GET['numerocolumnas']) ? intval($_GET['numerocolumnas']) : 8;
$fila_bowser = isset($_GET['fila']) ? intval($_GET['fila']) : -1;
$columna_bowser = isset($_GET['columna']) ? intval($_GET['columna']) : -1;
$color_destacado = isset($_GET['color']) ? htmlspecialchars($_GET['color']) : '#FFC000';

if ($filas < 1 || $filas > 20 || $columnas < 1 || $columnas > 20) {
    die("El número de filas y columnas debe estar entre 1 y 20.");
}

if ($fila_bowser < 1 || $fila_bowser > 20 || $columna_bowser < 1 || $columna_bowser > 20) {
    die("La posición de Bowser debe estar dentro de los límites del tablero (1-20).");
}

$fila_bowser--;
$columna_bowser--;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero Generado</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>

    <h2>Tablero de Ajedrez</h2>
    <table>
        <?php
        for ($i = 0; $i < $filas; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $columnas; $j++) {
            
                $clase = (($i + $j) % 2 == 0) ? 'negro' : 'blanco';

                if ($i == $fila_bowser && $j == $columna_bowser) {
                    echo "<td class='destacado' style='background-color: $color_destacado;'>
                            <img src='imagen/Bowser.png' width='50px'>
                          </td>";
                } else {
                    echo "<td class='$clase'></td>";
                }
            }
            echo "</tr>";
        }
        ?>
    </table>

</body>
</html>
