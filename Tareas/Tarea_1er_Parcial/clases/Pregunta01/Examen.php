<?php
class Examen {
  private $n;
  private $cadena;
  private $a;
  private $b;
  private $c;

  public function __construct($n, $cadena, $a, $b, $c) {
    $this->n = $n;
    $this->cadena = $cadena;
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
  }

  public function calcularfibonacci() {
    $a = 0;
    $b = 1;
    echo "<select>";
    while ($a <= $this->n) {
      echo "<option>$a</option>";
      $siguiente = $a + $b;
      $a = $b;
      $b = $siguiente;
    }
    echo "</select>";
  }

  public function calcularmayor() {
    echo "<p>";
    $mayor = max($this->a, $this->b, $this->c);
    foreach ([$this->a, $this->b, $this->c] as $x) {
      if ($x == $mayor) {
        echo "<b>$x</b> ";
      } else {
        echo "$x ";
      }
    }
    echo "</p>";
  }

  public function piramide() {
    $len = strlen($this->cadena);
    for ($i = 1; $i <= $len; $i++) {
      echo substr($this->cadena, 0, $i) . "<br>";
    }
  }
}
?>
