<?php

namespace ImagickDemo\ImagickDraw;

class setVectorGraphics extends ImagickDrawExample {

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

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);

        $draw->ellipse(125, 70, 100, 50, 0, 360);

        $draw->ellipse(350, 70, 100, 50, 0, 315);

        $draw->push();
        $draw->translate(125, 250);
        $draw->rotate(30);
        $draw->ellipse(0, 0, 100, 50, 0, 360);
        $draw->pop();

        $draw->push();
        $draw->translate(350, 250);
        $draw->rotate(30);
        $draw->ellipse(0, 0, 100, 50, 0, 315);
        $draw->pop();


        $svg = $draw->getVectorGraphics();


        $draw2 = new \ImagickDraw();

        $draw2->setvectorgraphics($svg);

//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, $this->backgroundColor);
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw2);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}




 