<?php

namespace ImagickDemo\ImagickDraw;

class setTextUnderColor extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setTextUnderColor'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        $lightColor = new \ImagickPixel('LightCoral');

        $textUnderColor = new \ImagickPixel('green');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);

        $draw->annotation(50, 75, "Lorem Ipsum!");

        $draw->setTextUnderColor($textUnderColor);
        $draw->annotation(50, 175, "Lorem Ipsum!");


//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, "SteelBlue2");
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}





 