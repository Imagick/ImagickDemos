<?php

namespace ImagickDemo\ImagickDraw;

class setFontStyle extends ImagickDrawExample {

    function renderDescription() {
        return "Fonts depend on ghostscript";
    }

    function renderImage() {

        $draw = new \ImagickDraw();

        $draw->setStrokeColor($this->strokeColor);
        $draw->setFillColor($this->fillColor);
        $draw->setStrokeWidth(1);
        $draw->setFontSize(36);
        $draw->setFontStyle(\Imagick::STYLE_NORMAL);
        $draw->annotation(50, 50, "Lorem Ipsum!");

        $draw->setFontStyle(\Imagick::STYLE_ITALIC);
        $draw->annotation(50, 100, "Lorem Ipsum!");

        $draw->setFontStyle(\Imagick::STYLE_OBLIQUE);
        $draw->annotation(50, 150, "Lorem Ipsum!");


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



 