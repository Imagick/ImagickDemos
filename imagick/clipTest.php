<?php


function setClipPath($strokeColor, $fillColor, $backgroundColor, $output) {

    $draw = new \ImagickDraw();
    $draw->setStrokeColor($strokeColor);
    $draw->setFillColor($fillColor);
    $draw->setStrokeOpacity(1);
    $draw->setStrokeWidth(2);

    $clipPathName = 'testClipPath'.rand(10000000, 10000000000);

    $draw->pushClipPath($clipPathName);
    $draw->rectangle(0, 0, 250, 250);

    //if ($output == false) {
        for ($x=0 ; $x<100 ; $x++) {
            $startX = rand(0, 500);
            $startY = rand(0, 500);
            $draw->rectangle($startX, $startY, $startX + 20, $startY + 20);
        }
    //}

    $draw->popClipPath();
    $draw->setClipPath($clipPathName);
    $draw->rectangle(100, 100, 400, 400);

    $imagick = new \Imagick();
    $imagick->newImage(500, 500, $backgroundColor);
    $imagick->setImageFormat("png");

    $imagick->drawImage($draw);

    if ($output == true) {
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
        exit(0);
    }
}


setClipPath('black', "red", 'white', false);
setClipPath('black', "red", 'white', true);