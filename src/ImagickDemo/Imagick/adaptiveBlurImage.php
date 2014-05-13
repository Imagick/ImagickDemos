<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example {

    /**
     * @var
     */
    private $rsiControl;
    
    function __construct(\ImagickDemo\Control\ControlCompositeXRadiusXSigmaXImage $rsiControl) {
        $this->rsiControl = $rsiControl;
    }

    function getControl() {
        return $this->rsiControl;
    }
    
    function renderDescription() {
    }

    function renderImage() {
        
        $radius = $this->rsiControl->getRadius();
        $sigma = $this->rsiControl->getSigma();

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick->adaptiveBlurImage($radius, $sigma);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}