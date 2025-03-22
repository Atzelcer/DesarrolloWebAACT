<?php include("conexion.php"); 
$sql = "SELECT id, nombre, apellidos, fecha_nacimiento, sexo, correo FROM personas";

$resultado = $con->query($sql);
?>

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    th, td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }
    th {
        background-color: #f2f2f2;
    }
    tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    tr:hover {
        background-color: #f1f1f1;
    }
</style>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>nombre</th>
            <th>apellidos</th>
            <th>fecha_nacimiento</th>
            <th>sexo</th>
            <th>correo</th>
        </tr>
    </thead>
    <tbody>
<?php
while($row = mysqli_fetch_array($resultado)){
    ?>
    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['apellidos']; ?></td>
        <td><?php echo $row['fecha_nacimiento']; ?></td>
        <td><?php echo $row['sexo']; ?></td>
        <td><?php echo $row['correo']; ?></td>
        <td><a href="formularioInsertar.php?id=<?php echo$row['id'];?>">Editar</a><a href="">Eliminar</a></td>
    </tr>
<?php
}
?>
    </tbody>
</table>
<br>
<a href="formularioInsertar.php">Insertar</a>
<br>
