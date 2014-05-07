<?php

namespace ImagickDemo\ImagickDraw;

class polygon extends ImagickDrawExample {

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
        $draw->setStrokeWidth(4);

        $draw->setFillColor($fillColor);

        $points = [['x' => 40 * 5, 'y' => 10 * 5], ['x' => 20 * 5, 'y' => 20 * 5], ['x' => 70 * 5, 'y' => 50 * 5], ['x' => 60 * 5, 'y' => 15 * 5],];

        $draw->polygon($points);


//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 300, $this->backgroundColor);
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();


    }
}




 