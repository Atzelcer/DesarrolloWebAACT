<?php 
$valor = rand(1,3);
$vector = [
    1 => "imagenes/luffy.png",
    2 => "imagenes/robin.png",
    3 => "imagenes/zoro.png"
];

$iamgen = imagecreatefrompng($vector[$valor]);
header(header: "Content-Type: image/png");
imagepng($iamgen);-
?>

