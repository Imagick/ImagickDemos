<?php

namespace ImagickDemo\ImagickDraw;

class setFont extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setFont'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(36);

        $draw->setFont("../fonts/Arial.ttf");
        $draw->annotation(50, 50, "Lorem Ipsum!");

        $draw->setFont("../fonts/Consolas.ttf");
        $draw->annotation(50, 100, "Lorem Ipsum!");

        $draw->setFont("../fonts/Tahoma");
        $draw->annotation(50, 150, "Lorem Ipsum!");

        $draw->setFont("../fonts/CANDY.TTF");
        $draw->annotation(50, 200, "Lorem Ipsum!");

        $draw->setFont("../fonts/Inconsolata-dz.otf");
        $draw->annotation(50, 250, "Lorem Ipsum!");

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



 