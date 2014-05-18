<?php

namespace ImagickDemo\ImagickDraw;

class circle extends \ImagickDemo\Example {
    
    private $control;

    function __construct(\ImagickDemo\Control\CircleControl $control) {
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

        $backgroundColor = $this->control->getBackgroundColor();
        $fillColor = $this->control->getFillColor();
        $strokeColor = $this->control->getStrokeColor();


        $strokeColor = new \ImagickPixel($strokeColor);
        $fillColor = new \ImagickPixel($fillColor);

        $draw->setStrokeOpacity(1);
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);

        //Draw a circle on the y-axis, with it's centre
        //at 0, 250 that touches the origin
        $startX = $this->control->getOriginX();
        $startY = $this->control->getOriginY();
        $endX = $this->control->getEndX();
        $endY = $this->control->getEndY();
        
        $draw->circle($startX, $startY, $endX, $endY);

        //Create an image object which the draw commands can be rendered into
        $imagick = new \Imagick();
        $imagick->newImage(500, 500, $backgroundColor);
        $imagick->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $imagick->drawImage($draw);

        //Send the image to the browser
        header("Content-Type: image/png");
        echo $imagick->getImageBlob();

    }

}



 