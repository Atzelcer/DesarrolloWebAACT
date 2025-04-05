<?php
include 'Examen.php';

if (!isset($_GET['accion'])) {
  header("Location: menu.php");
  exit;
}

$accion = $_GET['accion'];

if ($accion == 'Fibonacci' && isset($_GET['n'])) {
  $ex = new Examen($_GET['n'], '', 0, 0, 0);
  $ex->calcularfibonacci();

} elseif ($accion == 'Mayor' && isset($_GET['a'], $_GET['b'], $_GET['c'])) {
  $ex = new Examen(0, '', $_GET['a'], $_GET['b'], $_GET['c']);
  $ex->calcularmayor();

} elseif ($accion == 'Piramide' && isset($_GET['cadena'])) {
  $ex = new Examen(0, $_GET['cadena'], 0, 0, 0);
  $ex->piramide();
}

header("refresh:3;url=menu.php");
