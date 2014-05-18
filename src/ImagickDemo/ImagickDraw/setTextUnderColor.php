<?php

namespace ImagickDemo\ImagickDraw;

class setTextUnderColor extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\TextUnderControl
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\TextUnderControl $control) {
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
        $textUnderColor = new \ImagickPixel($this->control->getTextUnderColor());

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);
        $draw->annotation(50, 75, "Lorem Ipsum!");
        $draw->setTextUnderColor($textUnderColor);
        $draw->annotation(50, 175, "Lorem Ipsum!");


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





 