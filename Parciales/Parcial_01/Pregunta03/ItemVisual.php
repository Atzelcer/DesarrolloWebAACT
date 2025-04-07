<?php
class ItemVisual {
  private $item;
  private $color;
  private $color_fondo;
  private $imagen;

  public function __construct($item, $color, $color_fondo, $imagen) {
    $this->item = $item;
    $this->color = $color;
    $this->color_fondo = $color_fondo;
    $this->imagen = $imagen;
  }

  public function mostrarCuadrado() {
    echo "<div style='width:400px; height:400px; background-color:$this->color_fondo; display:flex; flex-direction:column; justify-content:center; align-items:center; border:1px solid #000; box-shadow: 0 0 15px #000'>";
    echo "<img src='$this->imagen' width='250' style='margin-bottom: 20px'>";
    echo "<h2 style='color:$this->color; margin:0; font-size:30px; text-align:center'>$this->item</h2>";
    echo "</div>";
  }
  

  public function mostrarDiagonal() {
    echo "<table>";
    $letras = str_split($this->item);
    $n = count($letras);
    for ($i = 0; $i < $n; $i++) {
      echo "<tr>";
      for ($j = 0; $j < $n; $j++) {
        if ($i == $j) {
          echo "<td style='background:$this->color_fondo; color:$this->color; width:50px; height:50px; text-align:center; font-weight:bold'>{$letras[$i]}</td>";
        } else {
          echo "<td style='width:50px; height:50px'></td>";
        }
      }
      echo "</tr>";
    }
    echo "</table>";
  }
}
?>
