<?php

namespace ImagickDemo\Imagick;

class transformImageColorspace extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageColorSpace
     */
    private $rsiControl;
    
    function __construct(\ImagickDemo\Control\ControlCompositeImageColorSpace $rsiControl) {
        $this->rsiControl = $rsiControl;
    }

    function getControl() {
        return $this->rsiControl;
    }
    
    function renderDescription() {
    }

    function renderImage() {
        
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));

        //brightnessContrastImage(float brigthness, float contrast[, int channel])

        $colorSpace = $this->rsiControl->getColorSpaceType();
        
        $imagick->transformimagecolorspace($colorSpace);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}