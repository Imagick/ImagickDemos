<?php

namespace ImagickDemo\ImagickDraw;

class setFontWeight extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(1);

        $draw->setFontSize(36);

        $draw->setFontWeight(100);
        $draw->annotation(50, 50, "Lorem Ipsum!");

        $draw->setFontWeight(200);
        $draw->annotation(50, 100, "Lorem Ipsum!");

        $draw->setFontWeight(400);
        $draw->annotation(50, 150, "Lorem Ipsum!");

        $draw->setFontWeight(800);
        $draw->annotation(50, 200, "Lorem Ipsum!");


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
 