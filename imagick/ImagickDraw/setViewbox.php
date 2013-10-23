<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('brown');
$lightColor = new \ImagickPixel('LightCoral');


$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(2);
$draw->setFontSize(72);

/*
 
Sets the overall canvas size to be recorded with the drawing vector data. Usually this will be specified using the same size as the canvas image. When the vector data is saved to SVG or MVG formats, the viewbox is use to specify the size of the canvas image that a viewer will render the vector data on.

 */


$draw->circle(250, 250, 250, 0);

$draw->setviewbox(0, 0, 200, 200);

$draw->circle(125, 250, 250, 250);

$draw->translate(250, 125);
$draw->circle(0, 0, 125, 0);



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





 