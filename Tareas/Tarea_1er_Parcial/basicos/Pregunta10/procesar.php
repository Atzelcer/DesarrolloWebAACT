<?php
session_start();
include 'Cola.php';

if (!isset($_SESSION['cola'])) {
  $_SESSION['cola'] = serialize(new Cola('Normal'));
}

$cola = unserialize($_SESSION['cola']);

if (isset($_GET['accion'])) {
  $accion = $_GET['accion'];

  if ($accion == 'Insertar detras' && isset($_GET['valor'])) {
    $cola->insertardetras($_GET['valor']);
  }

  if ($accion == 'Insertar delante' && isset($_GET['valor'])) {
    $cola->insertardelante($_GET['valor']);
  }

  if ($accion == 'Eliminar') {
    $cola->eliminar();
  }

  if ($accion == 'Mostrar') {
    $cola->mostrar();
    $_SESSION['cola'] = serialize($cola);
    header("refresh:3;url=index.php");
    exit;
  }

  if ($accion == 'Cambiar tipo' && isset($_GET['tipo'])) {
    $cola = new Cola($_GET['tipo']);
  }

  if ($accion == 'Resetear') {
    unset($_SESSION['cola']);
    header("Location: index.php");
    exit;
  }

  $_SESSION['cola'] = serialize($cola);
}

header("Location: index.php");
