<?php

//$im = new Imagick(realpath('../images/TestImage3.jpg'));
$im = new Imagick(realpath('../images/sample.png'));

$reflection = clone $im;
$reflection->flipImage();
$reflection->cropImage($im->getImageWidth(), $im->getImageHeight() * 0.75, 0, 0);

$gradient = new Imagick();
$gradient->newPseudoImage($reflection->getImageWidth(), $reflection->getImageHeight(), 'gradient:transparent-black');

$reflection->compositeImage($gradient, Imagick::COMPOSITE_OVER, 0, 0);
$reflection->setImageOpacity(0.45);

$canvas = new Imagick();
$canvas->newImage($im->getImageWidth(), $im->getImageHeight() * 1.75, new ImagickPixel('black'));
$canvas->setImageFormat('jpg');
$canvas->compositeImage($im, Imagick::COMPOSITE_OVER, 0, 0);
$canvas->compositeImage($reflection, Imagick::COMPOSITE_OVER, 0, $im->getImageHeight());
$canvas->setImageCompression(Imagick::COMPRESSION_JPEG);
$canvas->setImageCompressionQuality(70);
$canvas->stripImage();

header('Content-Type: image/jpg');
echo $canvas;
