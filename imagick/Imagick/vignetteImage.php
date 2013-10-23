<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->vignetteImage(10, 155, 15, 5);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();