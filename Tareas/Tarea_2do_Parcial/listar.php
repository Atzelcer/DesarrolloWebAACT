<?php
session_start();
include("conexion.php");

if (!isset($_SESSION['usuario'])) {
    echo "NO_LOGIN";
    exit;
}

$nivel_sesion = $_SESSION['nivel'];
$correo_sesion = $_SESSION['usuario'];

// Mostrar usuario y botón cerrar sesión
echo "<div style='text-align: right; margin-bottom: 10px;'>
        <strong>$correo_sesion</strong>
        <button onclick='cerrarSesion()' style='margin-left: 10px;'>Cerrar sesión</button>
      </div>";

// Mostrar tabla
$sql = "SELECT * FROM usuarios";
$res = $con->query($sql);

echo "<table border='1' cellpadding='10'>";
echo "<tr>
        <th>Correo</th>
        <th>Nombre Completo</th>
        <th>Nivel</th>";

if ($nivel_sesion == 0) {
    echo "<th>Operación</th>";
}
echo "</tr>";

while ($fila = $res->fetch_assoc()) {
    $nivel_texto = ($fila['nivel'] == 0) ? "Administrador" : "Usuario";

    echo "<tr>";
    echo "<td>" . $fila['usuario'] . "</td>";
    echo "<td>" . $fila['nombrecompleto'] . "</td>";
    echo "<td>" . $nivel_texto . "</td>";

    if ($nivel_sesion == 0) {
        $accion = ($fila['nivel'] == 0) ? "Cambiar a usuario" : "Cambiar a administrador";
        $color = ($fila['nivel'] == 0) ? "#ccc" : "orange";

        echo "<td>
                <button style='background:$color' onclick='cambiarNivel(" . $fila['id'] . ")'>
                    $accion
                </button>
              </td>";
    }

    echo "</tr>";
}
echo "</table>";
?>
