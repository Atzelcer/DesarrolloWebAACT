<?php sesion_start();
//include()
$correo = $_POST['correo'];
$password = sha1($_POST['password']);

$stmt = $con->prepare('SELECT correo, nombre , nivel FROM usuarios WHERE correo=? AND password=?');
$stmt->bind_param("ss", $correo, $password);
$stmt->execute();

$result = $stmt->get_result();
if ($result->num_rows > 0) {
    echo "Usuario enconctrado";
    $_SESSION['correo'] = $correo;
    $_SESSION['nivel'] = $result->fetch_assoc()['nivel'];
    header("Location: ");
} else {
    echo "Error datos de autenticacion incorrectos ";
    ?>
    <meta http-equiv="refresh" content="3;url=formlogin.html">
}
<?php
}