<?php

namespace ImagickDemo\ImagickDraw;

class setFillRule extends ImagickDrawExample {

    function getDescription() {
        return "";
    }

   

    function renderImage1() {

        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setStrokeOpacity(1);
        $draw->setStrokeWidth(1.5);


        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

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
        $image->newImage(500, 500, $this->backgroundColor);
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();
    }



    function renderImage3() {
    
    //dupe of two ?

            $draw = new \ImagickDraw();

            $strokeColor = new \ImagickPixel($this->strokeColor);
            $fillColor = new \ImagickPixel($this->fillColor);

            $draw->setStrokeWidth(1);
            $draw->setStrokeColor($strokeColor);
            $draw->setFillColor($fillColor);

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
//$image->newImage(700, 320, $this->backgroundColor);

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