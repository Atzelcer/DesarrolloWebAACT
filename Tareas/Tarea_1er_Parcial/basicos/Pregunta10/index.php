<?php
session_start();
include 'Cola.php';

if (!isset($_SESSION['cola'])) {
  $_SESSION['cola'] = serialize(new Cola('Normal'));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu cola</title>
</head>
<body>
  <h1>Cola con sesiones</h1>

  <form action="procesar.php" method="GET">
    <label>Tipo:</label>
    <select name="tipo">
      <option value="Normal">Normal</option>
      <option value="dobleentrada">dobleentrada</option>
    </select>
    <input type="submit" name="accion" value="Cambiar tipo">
  </form>

  <form action="procesar.php" method="GET">
    <label>Valor:</label>
    <input type="text" name="valor" required>
    <input type="submit" name="accion" value="Insertar delante">
    <input type="submit" name="accion" value="Insertar detras">
  </form>

  <form action="procesar.php" method="GET">
    <input type="submit" name="accion" value="Eliminar">
    <input type="submit" name="accion" value="Mostrar">
    <input type="submit" name="accion" value="Resetear">
  </form>
</body>
</html>
