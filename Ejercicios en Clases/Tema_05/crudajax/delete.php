<?php 
include("conexion.php");

$id = $_GET['id'];

$stmt = $con->prepare("DELETE FROM personas WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "Registro eliminado correctamente.";
} else {
    echo "Error al eliminar: " . $stmt->error;
}

$stmt->close();
$con->close();
?>

<meta http-equiv="refresh" content="3;url=read.php">
