<?php

namespace ImagickDemo\ImagickDraw;

class roundRectangle extends \ImagickDemo\Example {

    private $control;
    
    function __construct(\ImagickDemo\Control\RoundRectangleControl $control) {
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

        $draw->setStrokeColor($strokeColor);
        $draw->setFillColor($fillColor);

        $draw->setStrokeOpacity(1);
        $draw->setStrokeWidth(2);

        $startX = $this->control->getStartX();
        $startY = $this->control->getStartY();
        $endX   = $this->control->getEndX();
        $endY   = $this->control->getEndY();
        $roundX = $this->control->getRoundX();
        $roundY = $this->control->getRoundY();

        $draw->roundRectangle(
             $startX, 
             $startY,
             $endX,
             $endY,
             $roundX,
             $roundY
        );

//        $draw->roundRectangle(300, 50, 450, 200, 25, 25);
//        $draw->roundRectangle(50, 300, 200, 450, 50, 10);
//        $draw->roundRectangle(300, 300, 450, 450, 150, 150);


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



 