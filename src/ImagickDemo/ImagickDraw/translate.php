<?php

namespace ImagickDemo\ImagickDraw;

class translate extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\TranslateControl
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\TranslateControl $translateControl) {
        $this->control = $translateControl;
    }

    function renderDescription() {
        return "";
    }
    
    function getControl() {
        return $this->control;
    }
    

    function renderImage() {

//skewX() skews the current coordinate system in the horizontal direction.

//Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $fillColor = new \ImagickPixel($this->control->getFillColor());
        $fillModifiedColor = new \ImagickPixel($this->control->getFillModifiedColor());
        $strokeColor = new \ImagickPixel($this->control->getStrokeColor());

        $startX = $this->control->getStartX();
        $startY = $this->control->getStartY();
        $endX = $this->control->getEndX();
        $endY = $this->control->getEndY();
        $translateX = $this->control->getTranslateX();
        $translateY = $this->control->getTranslateY();

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);
        $draw->rectangle($startX, $startY, $endX, $endY);

        $draw->setFillColor($fillModifiedColor);
        $draw->translate($translateX, $translateY);
        $draw->rectangle($startX, $startY, $endX, $endY);

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

 