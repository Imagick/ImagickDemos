<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();


$draw->setStrokeWidth(1);

$darkColor = new \ImagickPixel('black');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(5);


$points = [
    [ 'x' => 40 * 5, 'y' => 10 * 5],
    [ 'x' =>20 * 5, 'y' => 20 * 5],
    [ 'x' =>70 * 5, 'y' => 50 * 5],
    [ 'x' =>60 * 5, 'y' => 15 * 5],
];

$draw->polygon($points);


//Create an image object which the draw commands can be rendered into
$image = new Imagick();
$image->newImage(500, 300, "SteelBlue2");
$image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
$image->drawImage($draw);

//Send the image to the browser
header("Content-Type: image/png");
echo $image->getImageBlob();





 