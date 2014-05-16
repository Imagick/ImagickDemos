<?php

namespace ImagickDemo\Imagick;

class brightnessContrastImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeRadiusSigmaImage
     */
    private $rsiControl;
    
    function __construct(\ImagickDemo\Control\ControlCompositeRadiusSigmaImage $rsiControl) {
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

        //brightnessContrastImage(float brigthness, float contrast[, int channel])
        
        $imagick->brightnessContrastImage(20, 20);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}