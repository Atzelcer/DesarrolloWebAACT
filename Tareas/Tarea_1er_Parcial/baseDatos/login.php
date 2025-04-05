<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>
<body>
  <h2>Ingreso a sistema tienda</h2>
  <form action="autentificador.php" method="POST">
    <label>Login:</label>
    <input type="text" name="user" required><br><br>
    <label>Contrasena:</label>
    <input type="password" name="pass" required><br><br>
    <input type="submit" value="Ingresar">
  </form>
</body>
</html>
