<?php
session_start();

class Pila {
    private $elementos;
    private $tope;

    public function __construct() {
        if (!isset($_SESSION['pila'])) {
            $_SESSION['pila'] = [];
        }
        $this->elementos = &$_SESSION['pila'];
        $this->tope = count($this->elementos);
    }

    public function insertar($e) {
        array_push($this->elementos, $e);
        $this->tope++;
    }

    public function eliminar() {
        if ($this->tope > 0) {
            $eliminado = array_pop($this->elementos);
            $this->tope--;
            return "Elemento eliminado: $eliminado";
        } else {
            return "La pila está vacía, no hay elementos para eliminar.";
        }
    }

    public function mostrar() {
        if ($this->tope > 0) {
            return array_reverse($this->elementos);
        } else {
            return ["La pila está vacía."];
        }
    }

    public function vaciar() {
        $_SESSION['pila'] = [];
        $this->tope = 0;
    }
}
?>