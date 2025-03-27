<?php
    $dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
    echo "Los dias de la semana son: <br> ";
    foreach ($dias as $dia) {
        echo "$dia <br>";

    }
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre");
    echo "Los mesese del año son: <br> ";

    foreach ($meses as $mes) {
        echo "$mes <br>";
    }

    $datos=[1,"hola",3.14,true];
    echo "Los datos son: <br> ";
    foreach ($datos as $dato) {
        echo "$dato <br>";
    }

    //ahora haremos los arreglos soasociativos
    $persona = array("nombre" => "Juan", "apellido" => "Perez", "edad" => 30, "sexo" => "M");
    echo $persona["nombre"]. "<br>";
    echo $persona["apellido"]. "<br>";
    echo $persona["edad"]. "<br>";
    echo "Los datos de la persona son: <br> ";

    foreach ($persona as $clave => $valor) {
        echo "$clave: $valor <br>";
    }


    
?>