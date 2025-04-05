<?php
class Utiles {
  private $cadena;

  public function __construct($cadena) {
    $this->cadena = $cadena;
  }

  public function aumentarguiones($n) {
    $letras = str_split($this->cadena);
    $guiones = str_repeat('-', $n);
    echo implode($guiones, $letras);
  }
}
?>
