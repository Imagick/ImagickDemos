<?php

namespace ImagickDemo\ImagickDraw;

class scale extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeBackgroundColorStrokeColorFillColorFillModifiedColor $control) {
        $this->control = $control;
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }


    function renderDescription() {
        return "";
    }

    function renderImage() {
        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $fillColor = new \ImagickPixel($this->control->getFillColor());
        $fillModifiedColor = new \ImagickPixel($this->control->getFillModifiedColor());
        $draw->setStrokeColor($this->control->getStrokeColor());
        $draw->setStrokeWidth(4);
        $draw->setFillColor($fillColor);
        $draw->rectangle(200, 200, 300, 300);

        $draw->setFillColor($fillModifiedColor);
        $draw->scale(1.4, 1.4);
        $draw->rectangle(200, 200, 300, 300);

//Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 500, $this->control->getBackgroundColor());
        $image->setImageFormat("png");

//Render the draw commands in the ImagickDraw object 
//into the image.
        $image->drawImage($draw);

//Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();


//This produces an image of a red rectangle on a yellow background

    }

}



 