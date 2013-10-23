<?php


$imagick2 = new Imagick();
$imagick2->newPseudoImage(400, 400, 'gradient:black-white');

$imagick = new Imagick();
$imagick->newimage(400, 400, 'black');

$imagick->compositeimage($imagick2, Imagick::COMPOSITE_OVER, 0, 0);

$imagick->setImageFormat("png");

header("Content-Type: image/png");
echo $imagick->getImageBlob();