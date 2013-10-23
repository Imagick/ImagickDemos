<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('DarkSlateGrey');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(2);
$draw->setFontSize(72);





$paintTypes = [
    \Imagick::PAINT_POINT,
    \Imagick::PAINT_REPLACE,
    \Imagick::PAINT_FLOODFILL,
    \Imagick::PAINT_FILLTOBORDER,
    \Imagick::PAINT_RESET
];



$draw->rectangle(100, 100, 300, 200);

$draw->matte(120, 120, \Imagick::PAINT_FLOODFILL);


//$draw->rectangle(125, 170, 100, 150);


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





 