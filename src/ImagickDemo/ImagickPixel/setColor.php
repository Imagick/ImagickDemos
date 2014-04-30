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

//Create a ImagickDraw object to draw into.
        $draw = new ImagickDraw();

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
        $image = new Imagick();
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



 