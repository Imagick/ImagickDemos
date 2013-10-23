<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->solarizeImage(0.0001);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();