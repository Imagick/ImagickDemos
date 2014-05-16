<?php

namespace ImagickDemo\Imagick;


class vignetteImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageBlackPointWhitePointXY
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeImageBlackPointWhitePointXY $control) {
        $this->control = $control;
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }


    function renderDescription() {
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->control->getImagePath()));

        $blackPoint = $this->control->getBlackPoint();
        $whitePoint = $this->control->getWhitePoint();
        $x = $this->control->getX();
        $y = $this->control->getY();
        
        $imagick->vignetteImage($blackPoint, $whitePoint, $x, $y);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}