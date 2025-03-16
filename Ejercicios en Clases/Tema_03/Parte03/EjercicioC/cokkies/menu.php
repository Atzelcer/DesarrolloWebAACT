<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $a = $_GET["a"];
    $b = $_GET["b"];
    $c = $_GET["c"];
    ?>

<ul>
    <li><a href="calcular.php?a=<?php echo $a; ?>&b=<?php echo $b; ?>&c=<?php echo $c; ?>&op=sumar">Sumar</a></li>
    <li><a href="calcular.php?a=<?php echo $a; ?>&b=<?php echo $b; ?>&c=<?php echo $c; ?>&op=restar">Restar</a></li>
    <li><a href="calcular.php?a=<?php echo $a; ?>&b=<?php echo $b; ?>&c=<?php echo $c; ?>&op=multiplicar">Multiplicar</a></li>
    <li><a href="calcular.php?a=<?php echo $a; ?>&b=<?php echo $b; ?>&c=<?php echo $c; ?>&op=dividir">Dividir</a></li>

</ul>


</body>
</html>