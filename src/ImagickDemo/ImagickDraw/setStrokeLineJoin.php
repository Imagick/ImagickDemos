<?php

namespace ImagickDemo\ImagickDraw;

class setStrokeLineJoin extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {
//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();


        $draw->setStrokeWidth(1);

        $darkColor = new \ImagickPixel('black');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(20);

        $offset = 220;


        $lineJoinStyle = [\Imagick::LINEJOIN_MITER, \Imagick::LINEJOIN_ROUND, \Imagick::LINEJOIN_BEVEL,];


        for ($x = 0; $x < count($lineJoinStyle); $x++) {

            $draw->setStrokeLineJoin($lineJoinStyle[$x]);

            $points = [['x' => 40 * 5, 'y' => 10 * 5 + $x * $offset], ['x' => 20 * 5, 'y' => 20 * 5 + $x * $offset], ['x' => 70 * 5, 'y' => 50 * 5 + $x * $offset], ['x' => 40 * 5, 'y' => 10 * 5 + $x * $offset],];

            $draw->polyline($points);
        }


//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 700, $this->backgroundColor);
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();


    }

}


 