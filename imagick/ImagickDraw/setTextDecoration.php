<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();

$darkColor = new \ImagickPixel('brown');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(2);

$draw->setFontSize(72);

$decorations = [
    \Imagick::DECORATION_NO,
    \Imagick::DECORATION_UNDERLINE,
    \Imagick::DECORATION_OVERLINE,
    \Imagick::DECORATION_LINETROUGH
];

foreach ($decorations as $decoration) {
    $draw->setTextDecoration($decoration);
    $draw->annotation(50, 75 + $offset, "Lorem Ipsum!");
    $offset += 100;
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





 