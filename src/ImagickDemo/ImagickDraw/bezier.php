<?php

namespace ImagickDemo\ImagickDraw;

class bezier extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

        
        
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);

        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);

        $smoothPointsSet = [[['x' => 10.0 * 5, 'y' => 10.0 * 5], ['x' => 30.0 * 5, 'y' => 90.0 * 5], ['x' => 25.0 * 5, 'y' => 10.0 * 5], ['x' => 50.0 * 5, 'y' => 50.0 * 5],], [['x' => 50.0 * 5, 'y' => 50.0 * 5], ['x' => 75.0 * 5, 'y' => 90.0 * 5], ['x' => 70.0 * 5, 'y' => 10.0 * 5], ['x' => 90.0 * 5, 'y' => 40.0 * 5],],];

        foreach ($smoothPointsSet as $points) {
            $draw->bezier($points);
        }


        $disjointPoints = [[['x' => 10 * 5, 'y' => 10 * 5], ['x' => 30 * 5, 'y' => 90 * 5], ['x' => 25 * 5, 'y' => 10 * 5], ['x' => 50 * 5, 'y' => 50 * 5],], [['x' => 50 * 5, 'y' => 50 * 5], ['x' => 80 * 5, 'y' => 50 * 5], ['x' => 70 * 5, 'y' => 10 * 5], ['x' => 90 * 5, 'y' => 40 * 5],]];
        $draw->translate(0, 200);

        foreach ($disjointPoints as $points) {
            $draw->bezier($points);
        }

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


 