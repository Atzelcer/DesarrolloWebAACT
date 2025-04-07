<?php
$conn = new mysqli("localhost", "root", "", "bd_biblioteca");
$order = isset($_GET['order']) ? $_GET['order'] : 'id';
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'asc';
$nextSort = $sort == 'asc' ? 'desc' : 'asc';
$sql = "SELECT * FROM libros ORDER BY $order $sort";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Libros</title>
  <link rel="stylesheet" href="../css/estilo-libros.css">
</head>
<body>
  <table>
    <tr>
      <th>Imagen</th>
      <th><a href="?order=titulo&sort=<?php echo $nextSort ?>">Titulo</a></th>
      <th><a href="?order=autor&sort=<?php echo $nextSort ?>">Autor</a></th>
      <th><a href="?order=ideditorial&sort=<?php echo $nextSort ?>">Editorial</a></th>
      <th><a href="?order=anio&sort=<?php echo $nextSort ?>">Año</a></th>
    </tr>
    <?php
    $i = 0;
    while ($row = $result->fetch_assoc()) {
      $color = $i % 2 == 0 ? '#e6eef6' : 'white';
      echo "<tr style='background:$color'>";
      echo "<td><img src='../" . $row['imagen'] . "' width='70'></td>";
      echo "<td>" . $row['titulo'] . "</td>";
      echo "<td>" . $row['autor'] . "</td>";
      echo "<td>" . $row['ideditorial'] . "</td>";
      echo "<td>" . $row['anio'] . "</td>";
      echo "</tr>";
      $i++;
    }
    ?>
  </table>
  <br>
  <a href="pregunta5.php" class="volver">← Volver a pregunta5.php</a>
</body>
</html>
