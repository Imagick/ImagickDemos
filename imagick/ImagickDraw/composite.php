<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('brown');
$lightColor = new \ImagickPixel('LightCoral');


$draw->setStrokeColor($darkColor);
$draw->setFillColor('white');

$draw->setStrokeWidth(2);
$draw->setFontSize(72);


$draw->setStrokeOpacity(1);
$draw->setStrokeColor($darkColor);


$draw->setStrokeWidth(2);

$draw->setFont("../fonts/CANDY.TTF");

$draw->setFontSize(140 );

//$draw->setFillColor('none');
//$draw->rectangle(0, 0, 1000, 300);

$draw->annotation(50,   180, "Lorem Ipsum!");


$imagick = new Imagick(realpath("../images/TestImage.jpg"));



$draw->composite(Imagick::COMPOSITE_BLEND, 0, 0, 1000, 300, $imagick);


//Create an image object which the draw commands can be rendered into
$imagick = new Imagick();
$imagick->newImage(1000, 300, "SteelBlue2");
$imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
$imagick->drawImage($draw);

//Send the image to the browser
header("Content-Type: image/png");
echo $imagick->getImageBlob();





 