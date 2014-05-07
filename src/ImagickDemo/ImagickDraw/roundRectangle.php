<?php

namespace ImagickDemo\ImagickDraw;

class roundRectangle extends ImagickDrawExample {

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

        $draw->setStrokeOpacity(1);
        $draw->setStrokeWidth(2);

        $draw->roundRectangle(50, 50, 200, 200, 5, 5);

        $draw->roundRectangle(300, 50, 450, 200, 25, 25);

        $draw->roundRectangle(50, 300, 200, 450, 50, 10);

        $draw->roundRectangle(300, 300, 450, 450, 150, 150);


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



 