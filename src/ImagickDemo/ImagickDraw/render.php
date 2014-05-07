<?php

namespace ImagickDemo\ImagickDraw;

class render extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);


        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);

        $draw->rectangle(200, 200, 300, 300);

        $draw->render();

        $draw->translate(100, 100);

        $draw->render();

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

 