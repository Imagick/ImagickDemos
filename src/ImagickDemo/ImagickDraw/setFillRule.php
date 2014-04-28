<?php

namespace ImagickDemo\ImagickDraw;

class setFillRule extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setFillRule'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('DarkSlateGrey');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeOpacity(1);
        $draw->setStrokeWidth(1.5);


        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $fillRules = [\Imagick::FILLRULE_NONZERO, \Imagick::FILLRULE_EVENODD];

        $offset = 220;

        for ($x = 0; $x < 2; $x++) {

            $draw->setFillRule($fillRules[$x]);
            $draw->pathStart();

            $draw->pathmovetoabsolute(40 * 5, 10 * 5 + $x * $offset);
            $draw->pathlinetoabsolute(20 * 5, 20 * 5 + $x * $offset);
            $draw->pathlinetoabsolute(70 * 5, 50 * 5 + $x * $offset);
            $draw->pathclose();

            $draw->pathmovetoabsolute(20 * 5, 40 * 5 + $x * $offset);
            $draw->pathlinetoabsolute(70 * 5, 40 * 5 + $x * $offset);
            $draw->pathlinetoabsolute(90 * 5, 10 * 5 + $x * $offset);

            $draw->pathclose();
            $draw->pathfinish();
        }


//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 500, "SteelBlue2");
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();

    }

}