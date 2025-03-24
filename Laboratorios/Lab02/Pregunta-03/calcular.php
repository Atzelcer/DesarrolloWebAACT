<?php
function seraPrimo($numero){
    if ($numero < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0 ){
            return false;
        }
    }

    return true;
}


if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $cantidad = $_POST["cantidad"];
    $primos = array();
    $num = 2;

    while (count($primos) < $cantidad){
        if (seraPrimo($num)){
            $primos[] = $num;
        }
        $num++;
    }

    $cadena = implode(",", $primos);

    header("Location: mostrar.php?datos=$cadena");
    exit();
}else{
    header("Location: formulario.html");
    exit();
}
?>

