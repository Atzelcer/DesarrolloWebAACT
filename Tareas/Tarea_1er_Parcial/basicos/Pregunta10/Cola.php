<?php
class Cola {
  private $tipo;
  private $elementos;

  public function __construct($tipo) {
    $this->tipo = $tipo;
    $this->elementos = array();
  }

  public function insertardetras($valor) {
    $this->elementos[] = $valor;
  }

  public function insertardelante($valor) {
    if ($this->tipo == 'dobleentrada') {
      array_unshift($this->elementos, $valor);
    }
  }

  public function eliminar() {
    if (!empty($this->elementos)) {
      array_shift($this->elementos);
    }
  }

  public function mostrar() {
    echo "<h3>Cola ($this->tipo)</h3>";
    echo "<table border='1' style='border-collapse:collapse'><tr>";
    foreach ($this->elementos as $e) {
      echo "<td style='padding:10px'>$e</td>";
    }
    echo "</tr></table>";
  }
}
?>
