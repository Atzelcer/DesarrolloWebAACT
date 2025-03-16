<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php $n=$_GET['n']; ?>

    <form action="Suma.php" method="post">
        <?php for ($i = 0; $i < $n; $i++){ ?>
        <input type="number" name="sumando<?php echo $i; ?>"><br> 
        <?php } ?>
        <input type="submit" value="Sumar">
        <input type="hidden" name="n" value="<?php echo $n; ?>"> <!-- el hidden nos ayuda a percerbar un dato...-->

    </form>

    <!-- el hidden nos ayuda a percerbar un dato...-->
     <!-- La seguna forma sera la de la cokkies al lado del cliente y la otra al lado del servidor...-->
      <!-- Es la de sesiones o servidores ... y demas ..-->
</body>
</html>