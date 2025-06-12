<?php
header('Content-Type: application/json; charset=utf-8');
ini_set('display_errors', 1);
error_reporting(E_ALL);

$mysqli = new mysqli('localhost','root','','bd_biblioteca');
if ($mysqli->connect_errno) {
    echo json_encode(['error'=>"Conexión fallida ({$mysqli->connect_errno}): {$mysqli->connect_error}"]);
    exit;
}
$mysqli->set_charset('utf8mb4');

$prompt = isset($_GET['prompt']) ? $_GET['prompt'] : '';
$like   = '%'.$mysqli->real_escape_string($prompt).'%';


$sql = "
  SELECT
    l.id,
    l.imagen      AS image,
    l.titulo      AS title,
    l.autor       AS author,
    e.editorial   AS editorial,
    l.anio        AS year,
    c.carrera     AS career,
    l.idcarrera   AS career_id
  FROM libros l
  LEFT JOIN editoriales e ON l.ideditorial = e.id
  LEFT JOIN carreras    c ON l.idcarrera    = c.id
  WHERE l.titulo LIKE ?
     OR l.autor  LIKE ?
";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param('ss', $like, $like);
$stmt->execute();
$res = $stmt->get_result();

$books = [];
while ($row = $res->fetch_assoc()) {
    $books[] = $row;
}

echo json_encode($books, JSON_UNESCAPED_UNICODE);

$stmt->close();
$mysqli->close();
