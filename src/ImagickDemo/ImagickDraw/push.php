<?php

namespace ImagickDemo\ImagickDraw;

class push extends \ImagickDemo\Example {

    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor $control) {
        $this->control = $control;
    }
    
    function getControl() {
        return $this->control;
    }
    
    
    function renderDescription() {
        return "";
    }

    function renderImage() {

        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $strokeColor = new \ImagickPixel($this->control->getStrokeColor());
        $fillColor = new \ImagickPixel($this->control->getFillColor());
        $fillModifiedColor = new \ImagickPixel($this->control->getFillModifiedColor());

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillModifiedColor);
        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);
        $draw->push();
        $draw->translate(50, 50);
        $draw->rectangle(200, 200, 300, 300);
        $draw->pop();
        $draw->setFillColor($fillColor);
        $draw->rectangle(200, 200, 300, 300);

        //Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, $this->control->getBackgroundColor());
        $imagick->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $imagick->drawImage($draw);

        //Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();
    }
}


 