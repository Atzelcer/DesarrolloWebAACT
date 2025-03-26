<?php
require("../configuracion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $fecha_nacimiento = $_POST["fecha_nacimiento"];
    $sexo = $_POST["sexo"];
    $correo = $_POST["correo"];
    $profesion_id = $_POST["profesion_id"];

    // Verificar si ya existe el correo en la tabla personas
    $sql_verificar = "SELECT * FROM personas WHERE correo=?";
    $stmt = $con->prepare($sql_verificar);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "Este correo ya está registrado como usuario.";
        echo '<meta http-equiv="refresh" content="3;url=../vistas/formCrearUsuario.html">';
    } else {
        // Insertar nuevo usuario
        $sql_insertar = "INSERT INTO personas (nombres, apellidos, fecha_nacimiento, sexo, correo, profesion_id) 
                         VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_insertar = $con->prepare($sql_insertar);
        $stmt_insertar->bind_param("sssssi", $nombres, $apellidos, $fecha_nacimiento, $sexo, $correo, $profesion_id);

        if ($stmt_insertar->execute()) {
            echo "Usuario registrado exitosamente.";
            echo '<meta http-equiv="refresh" content="2;url=../Pagina-principal-index.html">';
        } else {
            echo "Error al registrar usuario.";
        }
    }
} else {
    echo "Acceso no permitido.";
}
?>
