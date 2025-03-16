<?php

if (session_status() === PHP_SESSION_ACTIVE) {
    session_start();
}
require_once 'ClasePila.php';

$pila = new Pila();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    
    switch ($accion) {
        case 'insertar':
            if (!empty($_POST['elemento'])) {
                $pila->insertar($_POST['elemento']);
                echo "Elemento insertado en la pila.";
            } else {
                echo "Debe ingresar un elemento.";
            }
            break;

        case 'eliminar':
            echo $pila->eliminar();
            break;

        case 'mostrar':
            echo "<h2>Elementos en la Pila:</h2>";
            echo "<ul>";
            foreach ($pila->mostrar() as $elem) {
                echo "<li>$elem</li>";
            }
            echo "</ul>";
            break;

        case 'salir':
            $pila->vaciar();
            session_unset(); 
            session_destroy(); 
            echo "Sesión cerrada y pila vaciada.";
            break;
    }
}

echo "<br><a href='formularioPila.html'>Volver</a>";
?>