<?php

namespace ImagickDemo\ImagickDraw;

class point extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setFillColor($fillColor);

        for ($x = 0; $x < 50000; $x++) {
            $draw->point(rand(0, 500), rand(0, 500));
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




 