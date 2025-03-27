<?php
require("../configuracion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $sexo = $_POST["sexo"];
    $correo = $_POST["correo"];
    $profesion_id = $_POST["profesion_id"];
    $contrasenia = sha1($_POST["contrasenia"]);
    $foto = "";

    if (isset($_FILES["imagen_personal"]) && $_FILES["imagen_personal"]["error"] === 0) {
        $nombre_temporal = $_FILES["imagen_personal"]["tmp_name"];
        $nombre_final = "imagenes/subidas/" . basename($_FILES["imagen_personal"]["name"]);
        move_uploaded_file($nombre_temporal, "../publicos/" . $nombre_final);
        $foto = $nombre_final;
    } elseif (!empty($_POST["imagen_predefinida"])) {
        $foto = "imagenes/logos/" . $_POST["imagen_predefinida"];
    } else {
        $foto = $sexo === "Femenino" ? "imagenes/logos/default-femenino.png" : "imagenes/logos/default-masculino.png";
    }

    $sql_verificar = "SELECT * FROM personas WHERE correo=?";
    $stmt = $con->prepare($sql_verificar);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "Este correo ya está registrado.";
        echo '<meta http-equiv="refresh" content="2;url=' . $_SERVER["HTTP_REFERER"] . '">';
    } else {
        $sql_insertar = "INSERT INTO personas (nombres, apellidos, fecha_nacimiento, sexo, correo, profesion_id, contrasenia, foto) 
                         VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt_insertar = $con->prepare($sql_insertar);
        $stmt_insertar->bind_param("ssssssss", $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo, $profesion_id, $contrasenia, $foto);

        if ($stmt_insertar->execute()) {
            echo '<meta http-equiv="refresh" content="1;url=' . $_SERVER["HTTP_REFERER"] . '">';
        } else {
            echo "Error al registrar usuario: " . $stmt_insertar->error;
        }
    }
} else {
    echo "Acceso denegado.";
}
?>
