<?php

namespace ImagickDemo\ImagickDraw;

class skewY extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('maroon');
        $color = new \ImagickPixel('LightCoral');

//$draw->setStrokeColor($darkColor);
        $draw->setFillColor($darkColor);
        $draw->rectangle(200, 200, 300, 300);

//$draw->setStrokeColor($color);
        $draw->setFillColor($color);
        $draw->skewY(20);
        $draw->rectangle(200, 200, 300, 300);


//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 500, $this->backgroundColor);
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();


//This produces an image of a red rectangle on a yellow background 


    }
}