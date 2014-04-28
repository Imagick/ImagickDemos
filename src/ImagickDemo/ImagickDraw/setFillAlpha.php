<?php

namespace ImagickDemo\ImagickDraw;

class setFillAlpha extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setFillAlpha'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);
        $draw->setStrokeOpacity(1);
        $draw->setStrokeWidth(2);

        $draw->rectangle(100, 200, 200, 300);

        
        //Help help I'm being deprecated!!
        //See the violence inherent in the system
        @$draw->setFillAlpha(0.4);
        $draw->rectangle(300, 200, 400, 300);

//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, "SteelBlue2");
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


    }
}
 