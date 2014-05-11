<?php

namespace ImagickDemo\Imagick;


class annotateImage extends ImagickExample {

    function renderDescription() {

     
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->imagePath));

        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(36);

        $draw->setFont("../fonts/Arial.ttf");
        $imagick->annotateimage($draw, 20, 20, 0, "Lorem Ipsum!");

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();

    }
}