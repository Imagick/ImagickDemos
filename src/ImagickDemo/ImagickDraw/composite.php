<?php

namespace ImagickDemo\ImagickDraw;

class composite extends ImagickDrawExample {

    function renderDescription() {
        return "";
    }

    function renderImage() {
        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $darkColor = new \ImagickPixel('brown');

        $draw->setStrokeColor($darkColor);
        $draw->setFillColor('black');

        $draw->setFillOpacity(1);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);

        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($darkColor);

        $draw->setStrokeWidth(2);

        $draw->setFont("../fonts/CANDY.TTF");

        $draw->setFontSize(140);

        $draw->rectangle(0, 0, 1000, 300);

        $draw->setFillColor('white');

        $draw->setfillopacity(1);
        $draw->annotation(50, 180, "Lorem Ipsum!");

        $imagick = new \Imagick(realpath("../images/TestImage.jpg"));
        $draw->composite(\Imagick::COMPOSITE_MULTIPLY, -500, -200, 2000, 600, $imagick);

        //$imagick->compositeImage($draw, 0, 0, 1000, 500);

        //$draw->composite(Imagick::COMPOSITE_COLORBURN, -500, -200, 2000, 600, $imagick);


        //Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(1000, 302, $this->backgroundColor);
        $imagick->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $imagick->drawImage($draw);

        //Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();


    }

}



 