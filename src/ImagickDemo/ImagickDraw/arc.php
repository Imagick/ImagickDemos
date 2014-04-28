<?php

namespace ImagickDemo\ImagickDraw;

class arc extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/arc'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        //http://www.imagemagick.org/Usage/distorts/affine/

        $draw->setStrokeWidth(1);

        $darkColor = new \ImagickPixel('black');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(2);


        $draw->arc(100, 50, 400, 150, 0, 180);

        $draw->arc(100, 200, 400, 300, 0, 270);


        //Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 450, "SteelBlue2");
        $image->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $image->drawImage($draw);

        //Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();

    }

}


