<?php

namespace ImagickDemo\ImagickDraw;

class setFillColor extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setFillColor'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('rgb(0, 0, 0)');


        $draw->setStrokeOpacity(1);
        $draw->setStrokeWidth(1.5);

        $draw->setStrokeColor($darkColor);


        $lightColor = new \ImagickPixel('DodgerBlue2');
        $draw->setFillColor($lightColor);
        $draw->rectangle(50, 50, 150, 150);


        $draw->setFillColor("rgb(200, 32, 32)");
        $draw->rectangle(200, 50, 300, 150);


//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 500, "#eee");
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();
    }

}
