<?php

//Create a ImagickDraw object to draw into.
$draw = new ImagickDraw();

//http://www.imagemagick.org/Usage/distorts/affine/

$draw->setStrokeWidth(1);

$darkColor = new \ImagickPixel('black');
$lightColor = new \ImagickPixel('LightCoral');

$draw->setStrokeColor($darkColor);
$draw->setFillColor($lightColor);

$draw->setStrokeWidth(2);

$PI = 3.141592653589794;
$angle = 60 * $PI / 360;


$affineIdentity = array(
    "sx" => 1,
    "sy" => 1,
    "rx" => 0,
    "ry" => 0,
    "tx" => 0,
    "ty" => 0
);

$affineScale = array(
    "sx" => 1.75,
    "sy" => 1.75,
    "rx" => 0,
    "ry" => 0,
    "tx" => 0,
    "ty" => 0
);

$affineShear = array(
    "sx" => 1,
    "sy" => 1,
    "rx" => sin($angle),
    "ry" => -sin($angle),
    "tx" => 0,
    "ty" => 0
);

$affineRotate = array(
    "sx" => cos($angle),
    "sy" => cos($angle),
    "rx" => sin($angle),
    "ry" => -sin($angle),
    "tx" => 0,
    "ty" => 0,
);


$affineTransform = array(
    "sx" => 1,
    "sy" => 1,
    "rx" => 0,
    "ry" => 0,
    "tx" => 30,
    "ty" => 30
);


$examples = [
    $affineIdentity,
    $affineScale,
    $affineShear,
    $affineRotate,
    $affineTransform
];

$count = 0;

foreach ($examples as $example) {
    $draw->push();
    $draw->translate(($count % 2) * 250, intval($count / 2) * 250);
    $draw->translate(100, 100);
    $draw->affine($example);
    $draw->rectangle(-50, -50, 50, 50);
    $draw->pop();
    $count++;
}


//Create an image object which the draw commands can be rendered into
$image = new Imagick();
$image->newImage(500, 750, "SteelBlue2");
$image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
$image->drawImage($draw);

//Send the image to the browser
header("Content-Type: image/png");
echo $image->getImageBlob();