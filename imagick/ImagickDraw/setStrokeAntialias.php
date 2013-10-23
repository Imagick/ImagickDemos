<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('black');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(1);

$draw->setStrokeAntialias(false);
$draw->line(100, 100, 400, 105);

$draw->line(100, 140, 400, 185);

$draw->setStrokeAntialias(true);
$draw->line(100, 110, 400, 115);
$draw->line(100, 150, 400, 195);

//Create an image object which the draw commands can be rendered into
$image = new Imagick();
$image->newImage(500, 250, "SteelBlue2");
$image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
$image->drawImage($draw);

//Send the image to the browser
header("Content-Type: image/png");
echo $image->getImageBlob();





 