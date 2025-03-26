<?php
session_start();
// require("../seguridad/verificarsesion.php");

// if ($_SESSION['nivel'] != 0) {
//     echo "Acceso restringido solo para usuarios.";
//     echo '<meta http-equiv="refresh" content="2;url=../Pagina-principal-index.html">';
//     die();
// }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Temas de la Materia</title>
  <link rel="stylesheet" href="../publicos/css/login-pagina_index.css">
  <style>
    .contenedor-botones {
      text-align: center;
      margin: 20px;
    }
    .boton-tema {
      margin: 10px;
      padding: 10px 20px;
      background-color: steelblue;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    .visor-pdf {
      width: 80%;
      height: 600px;
      margin: 20px auto;
      border: 2px solid #ccc;
    }
  </style>
</head>
<body>

  <h2 style="text-align:center;">Material de Aprendizaje</h2>

  <div class="contenedor-botones">
    <form method="get">
      <button class="boton-tema" name="tema" value="tema0.pdf">Tema 0</button>
      <button class="boton-tema" name="tema" value="tema1.pdf">Tema 1</button>
      <button class="boton-tema" name="tema" value="tema2.pdf">Tema 2</button>
      <button class="boton-tema" name="tema" value="tema3.pdf">Tema 3</button>
    </form>
  </div>

  <?php if (isset($_GET['tema'])): ?>
    <div class="visor-pdf">
      <iframe src="../publicos/pdfs/<?php echo htmlspecialchars($_GET['tema']); ?>" width="100%" height="100%"></iframe>
    </div>
  <?php endif; ?>

  <div style="text-align:center;">
    <a href="../Pagina-principal-index.html" class="boton">Volver</a>
  </div>

</body>
</html>
