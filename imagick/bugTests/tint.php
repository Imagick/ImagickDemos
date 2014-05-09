<?php


$tint = new \ImagickPixel('rgba(255, 0, 0, 1)');
$imagick = new \Imagick();
$imagick->newPseudoImage(200, 200, 'gradient:');
$imagick->tintImage($tint, 50);
$imagick->setImageFormat('png');
header("Content-Type: image/png");
echo $imagick->getImageBlob();




 