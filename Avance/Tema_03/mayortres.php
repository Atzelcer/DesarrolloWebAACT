<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $num1 = 5;
        $num2 = 3;
        $num3 = 10;

        if ($num1 > $num2 && $num1 > $num3) {
            echo "El número mayor es: $num1";
        } elseif ($num2 > $num1 && $num2 > $num3) {
            echo "El número mayor es: $num2";
        } else {
            echo "el numero mayor es: $num3";
        }
    ?>
</body>
</html>