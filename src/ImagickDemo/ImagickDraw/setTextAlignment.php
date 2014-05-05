<?php

namespace ImagickDemo\ImagickDraw;

class setTextAlignment extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');
        $lightColor = new \ImagickPixel('LightCoral');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor($lightColor);

        $draw->setStrokeWidth(1);

        $draw->setFontSize(36);


        $draw->setTextAlignment(\Imagick::ALIGN_LEFT);
        $draw->annotation(250, 75, "Lorem Ipsum!");

        $draw->setTextAlignment(\Imagick::ALIGN_CENTER);
        $draw->annotation(250, 150, "Lorem Ipsum!");

        $draw->setTextAlignment(\Imagick::ALIGN_RIGHT);
        $draw->annotation(250, 225, "Lorem Ipsum!");


        $draw->line(250, 0, 250, 500);


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




 