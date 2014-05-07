<?php

namespace ImagickDemo\ImagickDraw;

class setFontSize extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);


        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);

        //$draw->setFont("../fonts/CANDY.TTF");
        $draw->setFont("../fonts/Arial.TTF");

        $sizes = [24, 36, 48, 60, 72];

        foreach ($sizes as $size) {
            $draw->setFontSize($size);
            $draw->annotation(50, ($size * $size / 16), "Lorem Ipsum!");
        }

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



 