<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        /* $cuadrado{

        } */
    </style>
</head>
<body>
    <?php 
        $name = $_POST['nombre'];
        $color = $_POST['color'];
        $color_fondo = $_POST['color_fondo'];
    ?>

<div style="border:1px solid black;background-color: <?php echo $color_fondo; ?>;color=<?php echo $color?>; padding: 20px"></div>


</body>
</html>