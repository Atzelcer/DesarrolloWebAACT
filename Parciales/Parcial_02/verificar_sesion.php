<?php
session_start();

if (isset($_SESSION['nivel'])) {
    echo json_encode([
        "loggeado" => true,
        "nivel" => $_SESSION['nivel']
    ]);
} else {
    echo json_encode(["loggeado" => false]);
}
?>
