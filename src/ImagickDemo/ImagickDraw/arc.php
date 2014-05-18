<?php

namespace ImagickDemo\ImagickDraw;

class arc extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ArcControl
     */
    private $control;

    function __construct(\ImagickDemo\Control\ArcControl $control) {
        $this->control = $control;

        $this->backgroundColor = $control->getBackgroundColor();
        $this->strokeColor = $control->getStrokeColor();
        $this->fillColor = $control->getFillColor();
    }

    function getControl() {
        return $this->control;
    }
    
    function renderImageURL() {
        return $this->control->getURL();
    }
    
    
    function renderDescription() {
        return "";
    }

    function renderImage() {
        //Create a ImagickDraw object to draw into.
        $draw = new \ImagickDraw();

        $draw->setStrokeWidth(1);

        $strokeColor = new \ImagickPixel($this->strokeColor);
        $fillColor = new \ImagickPixel($this->fillColor);
        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);
        $draw->setStrokeWidth(2);
        $sx = $this->control->getStartX();//  Starting x ordinate of bounding rectangle
        $sy = $this->control->getStartY();//	 * starting y ordinate of bounding rectangle
        $ex = $this->control->getEndX();// * ending x ordinate of bounding rectangle
        $ey = $this->control->getEndX();// * ending y ordinate of bounding rectangle 
        $sd = $this->control->getStartAngle();// starting degrees of rotation
        $ed = $this->control->getEndAngle();// ending degrees of rotation

        $draw->arc($sx, $sy, $ex, $ey, $sd, $ed);

        //Create an image object which the draw commands can be rendered into
        $image = new \Imagick();
        $image->newImage(500, 500, $this->backgroundColor);
        $image->setImageFormat("png");

        //Render the draw commands in the ImagickDraw object 
        //into the image.
        $image->drawImage($draw);

        //Send the image to the browser
        header("Content-Type: image/png");
        echo $image->getImageBlob();

    }

}


