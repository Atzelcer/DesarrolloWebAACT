<?php
inlude("conexion.php");



$correo = $_POST["correo"];
$password = $_POST["password"];

$stmt = $cont->prepare('SELECT correo,nombre,nivel FROM usarios WHERE correo = ? AND password = ?';)
$stmt -> bind_param("ss", $correo, $password);
$stmt->exectute();



if ($stmt->execute9()){

    $stmt->store_result();
    echo "Usario correcto, encontrado";
}else {

    echo "Usuarios incorrecto, no encontrado";
}


?>