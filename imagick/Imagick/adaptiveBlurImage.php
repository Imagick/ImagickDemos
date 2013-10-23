<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$draw = new ImagickDraw();

$imagick->adaptiveBlurImage(4, 3);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();