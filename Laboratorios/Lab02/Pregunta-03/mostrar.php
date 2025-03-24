<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pregunta - 03 - Mostrar</title>
    <style>
        ol {
            border: 2px solid green;
            background-color: yellow;
            text-align: center;
            list-style-position: inside;
            padding: 10px;
            width: 300px;
            margin: 20px auto;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h2>Lista de Numeros Primos</h2>

    <?php 
    if (isset($_GET["datos"])) {

        $datos = $_GET["datos"];
        $lista = explode(",", $datos);
    ?>
    
    <ol>
        <?php foreach ($lista as $valor): ?>
            <li><?php echo $valor; ?></li>
        <?php endforeach; ?>
    </ol>

    <?php 
    } else {
        echo "No se recibieron datos, tomarlo en cuenta ...";
    }
    ?>
</body>
</html>
