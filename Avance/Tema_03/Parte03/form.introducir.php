<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php sessio_start();
    $n=$_GET['n']; ?>

    <form action="sumar.php" method="get">
        <input type="hidden" name="n" value="<?php echo $n; ?>">
        <?php for($i=0; $i<$n; $i++) { ?>
            <label for="num<?php echo $i; ?>">Número <?php echo $i; ?></label>
            <input type="number" name="num<?php echo $i; ?>" id="num<?php echo $i; ?>"><br>
        <?php } ?>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>