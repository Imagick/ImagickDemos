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

        $draw->setStrokeColor('none');
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(1);
        $draw->setFontSize(32);

        $draw->setTextAntialias(false);
        $draw->annotation(5, 30, "Lorem Ipsum!");

        $draw->setTextAntialias(true);
        $draw->annotation(5, 65, "Lorem Ipsum!");

        //Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(220, 80, $this->backgroundColor);
        $imagick->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $imagick->drawImage($draw);

        //Scale the image so that people can see the aliasing.
        $imagick->scaleImage(220 * 6, 80 * 6);
        $imagick->cropImage(640, 480, 0, 0);
        
        //Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}
 