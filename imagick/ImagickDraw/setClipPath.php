<?php

$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('brown');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeOpacity(1);
$draw->setStrokeWidth(2);

$clipPathName = 'testClipPath';

$draw->pushClipPath($clipPathName);

$draw->rectangle(0, 0, 250, 250);

$draw->popClipPath();

$draw->setClipPath($clipPathName);

$draw->rectangle(200, 200, 300, 300);

//Create an image object which the draw commands can be rendered into
$imagick = new Imagick();
$imagick->newImage(500, 500, "SteelBlue2");
$imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
$imagick->drawImage($draw);

//Send the image to the browser
header("Content-Type: image/png");
echo $imagick->getImageBlob();





 