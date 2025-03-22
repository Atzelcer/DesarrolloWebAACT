<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="insertar.php" method="post">

        <label for="nombre">Nombres: </label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="apellido">Apellidos: </label>
        <input type="text" name="apellido" id="apellido" required>
        <br>
        <label for="fecha_nacimiento">Fecha de Nacimiento: </label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        <br>
        <label for="sexo">Sexo: </label>
        <input type="radio" name="sexo" value="masculino">Masculino
        <input type="radio" name="sexo" value="femenino">Femenino
        <br>
        <label for="correo">Correo: </label>
        <input type="email" name="correo" id="correo" required>
        <br>
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
        <br>
    </form>
</body>
</html>