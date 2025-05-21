<?php
    $alumno1 = array("nombre" => "Juan", "apellido" => "Perez", "edad" => 30, "sexo" => "M");
    $alumno2 = array("nombre" => "Maria", "apellido" => "Gomez", "edad" => 25, "sexo" => "F");
    $alumno3 = array("nombre" => "Pedro", "apellido" => "Garcia", "edad" => 35, "sexo" => "M");
    $alumno4 = array("nombre" => "Ana", "apellido" => "Jimenez", "edad" => 28, "sexo" => "F");

    $lista_alumno = array($alumno1, $alumno2, $alumno3, $alumno4);
    echo "<table border='1' style='border-collapse: collapse;'>";
    echo "<tr><th>Nombre</th><th>Apellido</th><th>Edad</th></tr>";///veamos

    foreach ($lista_alumno as $alumno) {//comenzamos
        echo "<tr>";
        echo "<td>".$alumno["nombre"]."</td>";
        echo "<td>".$alumno["apellido"]."</td>";
        echo "<td>".$alumno["edad"]."</td>";
        echo "</tr>";
    }
    echo "</table>";


?>