<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$draw = new ImagickDraw();

$imagick->adaptiveThresholdImage(2, 2, 0.1);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();