<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$draw = new ImagickDraw();

$border = new ImagickPixel('red');
$flood =  new ImagickPixel('rgb(128, 128, 128)');

$imagick->colorFloodfillImage($flood, 0, $border, 5, 5);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();