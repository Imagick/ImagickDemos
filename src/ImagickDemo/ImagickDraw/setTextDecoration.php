<?php

namespace ImagickDemo\ImagickDraw;

class setTextDecoration extends \ImagickDemo\Example {

    function __construct(\ImagickDemo\Control\TextDecoration $control) {
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

        $strokeColor = new \ImagickPixel($this->control->getStrokeColor());
        $fillColor = new \ImagickPixel($this->control->getFillColor());
        $decoration = $this->control->getTextDecoration();
        
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);
        $draw->setStrokeWidth(2);
        $draw->setFontSize(72);
    
        $draw->setTextDecoration($decoration);
        $draw->annotation(50, 75, "Lorem Ipsum!");
        //$offset += 100;



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


 