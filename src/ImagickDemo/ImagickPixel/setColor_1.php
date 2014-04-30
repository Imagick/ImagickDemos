<?php



$color = new \ImagickPixel('red');

$draw = new ImagickDraw();
$draw->setStrokeColor($color);
$draw->setFillColor($color);

$draw->rectangle(200, 200, 300, 300);

$drawing = new Imagick();
$drawing->newImage(500, 500, "white");
$drawing->setImageFormat("png");
$drawing->drawImage($draw);

header("Content-Type: image/png");
echo $drawing->getImageBlob();






$draw = new ImagickDraw();
$draw->setStrokeWidth(5);

//$draw->setStrokeColor("black");
//$color = $draw->getstrokecolor();

//We're just modifying the current stroke color, we could create a new
//color from scratch.
$color = new \ImagickPixel();
//$color->setcolorvalue(\Imagick::COLOR_RED, 0);
$color->setcolorvalue(\Imagick::COLOR_GREEN, 1);
//$color->setcolorvalue(\Imagick::COLOR_BLUE, 0);
//$color->setColorValue(\Imagick::COLOR_ALPHA, 16 / 256.0);

$draw->setStrokeColor($color);
$draw->setFillColor($color);

$draw->rectangle(200, 200, 300, 300);


$drawing = new Imagick();
$drawing->newImage(500, 500, "white");
$drawing->setImageFormat("png");
$drawing->drawImage($draw);

header("Content-Type: image/png");
echo $drawing->getImageBlob();
