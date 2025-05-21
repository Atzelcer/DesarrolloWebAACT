<?php session_start();
$n = $_SESSION['n'];
$suma = 0;
for ($i = 0; $i < $n; $i++) {
    $suma += $_GET['num' . $i];
}
echo "La suma de los números es $suma";
?>