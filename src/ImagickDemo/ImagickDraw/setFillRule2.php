<?php

namespace ImagickDemo\ImagickDraw;

class setFillRule2 extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setFillRule2'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('rgb(0, 0, 0)');
        $lightColor = new \ImagickPixel('DodgerBlue2');

        $draw->setStrokeWidth(1);
        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $fillRules = [\Imagick::FILLRULE_NONZERO, \Imagick::FILLRULE_EVENODD];

        $points = 11;
        $size = 150;

        $draw->translate(175, 160);

        for ($x = 0; $x < 2; $x++) {

            //$pointsArray = array();

            $draw->setFillRule($fillRules[$x]);
            $draw->pathStart();
            for ($n = 0; $n < $points * 2; $n++) {

                if ($n >= $points) {
                    $angle = fmod($n * 360 * 4 / $points, 360) * pi() / 180;
                }
                else {
                    $angle = fmod($n * 360 * 3 / $points, 360) * pi() / 180;
                }

                $positionX = $size * sin($angle);
                $positionY = $size * cos($angle);

                if ($n == 0) {
                    $draw->pathMoveToAbsolute($positionX, $positionY);
                }
                else {
                    $draw->pathLineToAbsolute($positionX, $positionY);
                }
            }

            $draw->pathClose();
            $draw->pathFinish();

            $draw->translate(325, 0);
        }

//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
//$image->newImage(700, 320, "SteelBlue2");

        $image->newImage(700, 320, "#eee");


        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();

    }
}
