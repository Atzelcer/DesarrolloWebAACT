<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("conexion..php");
    $id = GET['id'];
    $sql = "SELECT id, nombre, apellidos, fecha_nacimiento, sexo, correo FROM personas WHERE id = $id";
    $resultado = $con->query($sql);
    $row = mysqli_fetch_array($resultado);
    ?>
    <form action="insertar.php" method="post">
        <label for=

    </form>
</body>
</html>