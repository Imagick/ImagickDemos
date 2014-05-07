<?php

namespace ImagickDemo\ImagickDraw;

class popDefs extends ImagickDrawExample {

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

        $draw->setstrokeOpacity(1);
        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);


        $draw->pushDefs();

        $draw->setStrokeColor('white');
        $draw->rectangle(50, 50, 200, 200);
        $draw->popDefs();


        $draw->rectangle(300, 50, 450, 200);


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


 