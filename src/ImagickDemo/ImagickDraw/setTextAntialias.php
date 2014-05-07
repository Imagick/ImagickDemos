<?php

namespace ImagickDemo\ImagickDraw;

class setTextAntialias extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(1);

        $draw->setFontSize(72);

        $draw->setTextAntialias(false);
        $draw->annotation(50, 75, "Lorem Ipsum!");

        $draw->setTextAntialias(true);
        $draw->annotation(50, 175, "Lorem Ipsum!");

//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 250, $this->backgroundColor);
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);

        $imagick->scaleimage(2000, 1000);
//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();

//echo "done";


    }
}
 