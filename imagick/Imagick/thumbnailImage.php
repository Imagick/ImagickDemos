<?php
$imagick = new Imagick(realpath("../images/TestImage.jpg"));

$imagick->setbackgroundcolor('rgb(64, 64, 64)');

$imagick->thumbnailImage(100, 100, true, true);

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();