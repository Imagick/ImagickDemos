<?php

echo "Hmm";

$width = 300;
$height = 200;

$thumb = new Imagick(realpath("./vanilla_logo.png"));
$thumb->thumbnailImage($width,$height,true);

/* create canvas */
$canvas = new Imagick();
$canvas->newImage($width, $height, new ImagickPixel('transparent'), 'png');
$geometry = $thumb->getImageGeometry();

$x = ($width - $geometry['width']) / 2;
$y = ($height - $geometry['height']) / 2;
$canvas->compositeImage($thumb, imagick::COMPOSITE_OVER, $x, $y);
$canvas->writeImage("./logotest.png");
$canvas->destroy();    

echo "OK";