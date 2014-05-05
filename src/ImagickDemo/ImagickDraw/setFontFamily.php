<?php

namespace ImagickDemo\ImagickDraw;

class setFontFamily extends ImagickDrawExample {

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

        $draw->setFontSize(24);
        $draw->annotation(50, 50, "Lorem Ipsum!");

        $draw->setFontSize(36);
        $draw->annotation(50, 100, "Lorem Ipsum!");

        $draw->setFontSize(48);
        $draw->annotation(50, 150, "Lorem Ipsum!");

        $draw->setFontSize(60);
        $draw->annotation(50, 200, "Lorem Ipsum!");

        $draw->setFontSize(72);
        $draw->annotation(50, 250, "Lorem Ipsum!");


//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, $this->backgroundColor);
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


    }
}

 