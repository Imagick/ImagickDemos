<?php

namespace ImagickDemo\ImagickDraw;

class render extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/render'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        $lightColor = new \ImagickPixel('LightCoral');


        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(2);

        $draw->rectangle(200, 200, 300, 300);

        $draw->render();

        $draw->translate(100, 100);

        $draw->render();

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

 