<?php

namespace ImagickDemo\ImagickDraw;

class circle extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);

        //Draw a circle on the y-axis, with it's centre
        //at 0, 250 that touches the origin
        $draw->circle(0, 250, 0, 0);

        //$draw->circle(125, 250, 250, 250);

        //$draw->translate(250, 125);
        $draw->circle(250, 125, 250, 250);


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



 