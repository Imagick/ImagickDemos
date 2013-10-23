<?php


$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('brown');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(2);
$draw->setFontSize(36);

$fontStretchTypes = [
    \Imagick::STRETCH_ULTRACONDENSED,
    \Imagick::STRETCH_CONDENSED,
    \Imagick::STRETCH_SEMICONDENSED,
    \Imagick::STRETCH_SEMIEXPANDED,
    \Imagick::STRETCH_EXPANDED,
    \Imagick::STRETCH_EXTRAEXPANDED,
    \Imagick::STRETCH_ULTRAEXPANDED,
    \Imagick::STRETCH_ANY
];

$offset = 0;
foreach ($fontStretchTypes as $fontStretch) {
    $draw->setFontStretch($fontStretch);
    $draw->annotation(50, 75 + $offset, "Lorem Ipsum!");
    $offset += 50;
}


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





 