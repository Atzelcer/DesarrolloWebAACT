<?php
function fibonacci($n) {
  $a = 0;
  $b = 1;
  $suma = $a;
  $serie = [$a];

  for ($i = 1; $i <= $n; $i++) {
    $suma += $b;
    $serie[] = $b;
    $temp = $a + $b;
    $a = $b;
    $b = $temp;
  }

  return ['suma' => $suma, 'serie' => $serie];
}
?>
