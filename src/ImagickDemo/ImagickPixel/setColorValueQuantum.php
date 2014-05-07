<?php


namespace ImagickDemo\ImagickPixel;


class setColorValueQuantum extends \ImagickDemo\ExampleWithoutControl {

    function renderDescription() {
        return "";
    }

    function renderImage() {


        $image = new \Imagick();


        $quantumRange = $image->getQuantumRange();


//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

//Create an ImagickPixel with the predefined color 'red'


        $color = new \ImagickPixel('blue');


//$color->setColorValue(\Imagick::COLOR_RED, 256 / 256.0);
//$color->setColorValue(\Imagick::COLOR_GREEN, 25 / 256.0);
//$color->setColorValue(\Imagick::COLOR_BLUE, 0);
        $color->setcolorValueQuantum(\Imagick::COLOR_RED, 128 * $quantumRange['quantumRangeLong'] / 256);


//Set the stroke and fill colour and draw a rectangle
        $draw->setstrokewidth(1.0);
        $draw->setStrokeColor($color);
        $draw->setFillColor($color);
        $draw->rectangle(200, 200, 300, 300);

//Create an image object which the draw commands can be rendered into

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

 


 