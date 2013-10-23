<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$draw = new ImagickDraw();

$imagick->colorFloodfillImage('rgb(128, 128, 128)', 0, 'red', 5, 5);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();