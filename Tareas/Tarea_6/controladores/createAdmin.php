<?php
require("../configuracion/conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST["correo"];
    $password = sha1($_POST["password"]);
    $nombre = $_POST["nombre"];
    $nivel = 1; // administrador

    $sql_verificar = "SELECT * FROM usuarios WHERE correo=?";
    $stmt = $con->prepare($sql_verificar);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        echo "Este correo ya está registrado como administrador.";
        echo '<meta http-equiv="refresh" content="3;url=../vistas/formCrearAdmin.html">';
    } else {
        $sql_insertar = "INSERT INTO usuarios (correo, password, nombre, nivel) VALUES (?, ?, ?, ?)";
        $stmt_insertar = $con->prepare($sql_insertar);
        $stmt_insertar->bind_param("sssi", $correo, $password, $nombre, $nivel);

        if ($stmt_insertar->execute()) {
            echo "Administrador registrado exitosamente.";
            echo '<meta http-equiv="refresh" content="2;url=../Pagina-principal-index.html">';
        } else {
            echo "Error al registrar administrador.";
        }
    }
} else {
    echo "Acceso denegado.";
}
?>
