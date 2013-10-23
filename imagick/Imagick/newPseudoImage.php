<?php


$imagick = new Imagick();
$imagick->newPseudoImage(200, 200, 'gradient:');

$imagick->sigmoidalcontrastimage(true, 14, 90);


$imagick->setImageFormat("jpg");

header("Content-Type: image/jpg");
echo $imagick->getImageBlob();

