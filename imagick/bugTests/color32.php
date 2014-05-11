<?php



function createMask() {

    $draw = new \ImagickDraw();

    $draw->setStrokeOpacity(0);

    $white = new ImagickPixel('white');
    $rgb255 = new ImagickPixel('rgb(255, 255, 255)');
    
    $draw->setStrokeColor('rgb(255, 255, 255)');
    $draw->setFillColor($white);
    $draw->circle(250, 250, 220, 250);
    $imagick = new \Imagick();
    $imagick->newImage(512, 512, "blue");
    $imagick->drawImage($draw);
    
    //$imagick->autoLevelImage();

    //$imagick->negateImage(true);

    if (true) {
        $imagick->setImageFormat('png');
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
        exit(0);
    }

    return $imagick;
}


$white = new ImagickPixel('white');

$rgb255 = new ImagickPixel('rgb(255, 255, 255)');

createMask();

echo "White is: ".$white->getColorAsString()."\n";
echo "rgb255 is: ".$rgb255->getColorAsString()."\n";

