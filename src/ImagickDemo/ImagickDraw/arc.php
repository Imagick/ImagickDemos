<?php

namespace ImagickDemo\ImagickDraw;

class arc extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {
        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $draw->setStrokeWidth(1);

        $darkColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);

        $draw->arc(100, 50, 400, 150, 0, 180);
        $draw->arc(100, 200, 400, 300, 0, 270);

        //Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 450, $this->backgroundColor);
        $image->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $image->drawImage($draw);

        //Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();

    }

}


