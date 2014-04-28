<?php

namespace ImagickDemo\ImagickDraw;

class setStrokeLineCap extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setStrokeLineCap'/>";
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

        $draw->setStrokeWidth(25);

        $lineTypes = [\Imagick::LINECAP_BUTT, \Imagick::LINECAP_ROUND, \Imagick::LINECAP_SQUARE,];

        $offset = 0;

        foreach ($lineTypes as $lineType) {
            $draw->setStrokeLineCap($lineType);
            $draw->line(50 + $offset, 50, 50 + $offset, 250);
            $offset += 50;
        }


//Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(300, 300, "SteelBlue2");
        $imagick->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $imagick->drawImage($draw);


//Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


    }
}

 