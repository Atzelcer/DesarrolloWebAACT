<?php
class Examen {
  private $cadena1;
  private $cadena2;

  public function __construct($c1, $c2) {
    $this->cadena1 = $c1;
    $this->cadena2 = $c2;
  }

  public function cruzar() {
    $pos1 = -1;
    $pos2 = -1;

    for ($i = 0; $i < strlen($this->cadena1); $i++) {
      for ($j = 0; $j < strlen($this->cadena2); $j++) {
        if ($this->cadena1[$i] == $this->cadena2[$j]) {
          $pos1 = $i;
          $pos2 = $j;
          break 2;
        }
      }
    }

    if ($pos1 == -1 || $pos2 == -1) {
      echo "<h2>no existen letras comunes</h2>";
      return;
    }

    echo "
    <style>
      table {
        border-collapse: collapse;
        margin: 50px auto;
      }
      td {
        width: 40px;
        height: 40px;
        text-align: center;
        border: 1px solid black;
        font-size: 18px;
      }
      .marcado {
        background-color: #0074D9;
        color: black;
        font-weight: bold;
      }
    </style>
    ";

    echo "<table>";

    for ($i = 0; $i < strlen($this->cadena2); $i++) {
      echo "<tr>";
      for ($j = 0; $j < strlen($this->cadena1); $j++) {
        if ($i == $pos2) {
          echo "<td class='marcado'>" . $this->cadena1[$j] . "</td>";
        } elseif ($j == $pos1) {
          echo "<td class='marcado'>" . $this->cadena2[$i] . "</td>";
        } else {
          echo "<td></td>";
        }
      }
      echo "</tr>";
    }

    echo "</table>";
  }
}

if (isset($_GET['c1']) && isset($_GET['c2'])) {
  $examen = new Examen($_GET['c1'], $_GET['c2']);
  $examen->cruzar();
  header("refresh:3;url=formulario-examen.html");
} else {
  echo "<h2>faltan datos</h2>";
  header("refresh:3;url=formulario-examen.html");
}
?>
