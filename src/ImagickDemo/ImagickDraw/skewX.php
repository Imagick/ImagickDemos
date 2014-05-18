<?php
namespace ImagickDemo\ImagickDraw;

class skewX extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\SkewControl
     */
    private $control;

    function __construct(\ImagickDemo\Control\SkewControl $skewControl) {
        $this->control = $skewControl;
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
        $strokeColor = new \ImagickPixel($this->control->getStrokeColor());

        $draw->setStrokeColor($strokeColor);
        $draw->setStrokeWidth(2);

        $startX = $this->control->getStartX();
        $startY = $this->control->getStartY();
        $endX = $this->control->getEndX();
        $endY = $this->control->getEndY();
        $skew = $this->control->getSkew();

        $draw->setFillColor($fillColor);
        $draw->rectangle($startX, $startY, $endX, $endY);

        $draw->setFillColor($fillModifiedColor);
        $draw->skewX($skew);
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
    }

}