<?php

namespace ImagickDemo\ImagickDraw;

class setStrokeDashOffset extends \ImagickDemo\Example {

    function renderImageURL() {
        return "<img src='/image/ImagickDraw/setStrokeDashOffset'/>";
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

        $draw->setStrokeDashArray([20, 20]);
        $draw->setStrokeDashOffset(0);
        $draw->rectangle(100, 50, 225, 175);

//Start the dash effect halfway through the solid portion
        $draw->setStrokeDashOffset(10);
        $draw->rectangle(275, 50, 400, 175);


//Start the dash effect on the space portion
        $draw->setStrokeDashOffset(20);
        $draw->rectangle(100, 200, 225, 350);


        $draw->setStrokeDashOffset(5);
        $draw->rectangle(275, 200, 400, 350);


//
////Start the dash effect halfway through the solid portion
//$draw->setStrokeDashOffset(10);
//$draw->rectangle(275, 50, 400, 175);


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




 