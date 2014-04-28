<?php

namespace ImagickDemo\ImagickDraw;

class setStrokeDashArray extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setStrokeDashArray'/>";
    }

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('black');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(4);

        $draw->setStrokeDashArray([10, 10]);
        $draw->rectangle(100, 50, 225, 175);

        $draw->setStrokeDashArray([20, 5, 20, 5, 5, 5,]);
        $draw->rectangle(275, 50, 400, 175);

        $draw->setStrokeDashArray([20, 5, 20, 5, 5]);
        $draw->rectangle(100, 200, 225, 350);

        $draw->setStrokeDashArray([1, 1, 1, 1, 2, 2, 3, 3, 5, 5, 8, 8, 13, 13, 21, 21, 34, 34, 55, 55, 89, 89, 144, 144, 233, 233, 377, 377, 610, 610, 987, 987, 1597, 1597, 2584, 2584, 4181, 4181,]);


        $draw->rectangle(275, 200, 400, 350);


//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 400, "SteelBlue2");
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();


    }
}





 