<?php

namespace ImagickDemo\ImagickPixel;


class setColor extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickPixel/setColor'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {
        $this->renderImage1();
    }
    
    function renderImage1() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

//Create an ImagickPixel with the predefined color 'red'
        $strokeColor = new \ImagickPixel('firebrick');

        $fillColor = new \ImagickPixel();
        $fillColor->setColor('rgba(100%, 75%, 0%, 1.0)');

//Set the stroke and fill colour and draw a rectangle
        $draw->setstrokewidth(3.0);
        $draw->setStrokeColor($strokeColor);

        $draw->setFillColor($fillColor);
        $draw->rectangle(200, 200, 300, 300);

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
    
    function renderImage2() {

        $color = new \ImagickPixel('red');

        $draw = new \ImagickDraw();
        $draw->setStrokeColor($color);
        $draw->setFillColor($color);

        $draw->rectangle(200, 200, 300, 300);

        $drawing = new \Imagick();
        $drawing->newImage(500, 500, "white");
        $drawing->setImageFormat("png");
        $drawing->drawImage($draw);

        header("Content-Type: image/png");
        echo $drawing->getImageBlob();


        $draw = new \ImagickDraw();
        $draw->setStrokeWidth(5);

//$draw->setStrokeColor("black");
//$color = $draw->getstrokecolor();

//We're just modifying the current stroke color, we could create a new
//color from scratch.
        $color = new \ImagickPixel();
//$color->setcolorvalue(\Imagick::COLOR_RED, 0);
        $color->setcolorvalue(\Imagick::COLOR_GREEN, 1);
//$color->setcolorvalue(\Imagick::COLOR_BLUE, 0);
//$color->setColorValue(\Imagick::COLOR_ALPHA, 16 / 256.0);

        $draw->setStrokeColor($color);
        $draw->setFillColor($color);

        $draw->rectangle(200, 200, 300, 300);


        $drawing = new \Imagick();
        $drawing->newImage(500, 500, "white");
        $drawing->setImageFormat("png");
        $drawing->drawImage($draw);

        header("Content-Type: image/png");
        echo $drawing->getImageBlob();

    }

}



 