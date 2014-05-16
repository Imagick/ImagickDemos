<?php

namespace ImagickDemo\Imagick;

class blueShiftImage extends \ImagickDemo\Example {

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
        //TODO add blue shift control
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick->blueShiftImage(1.5);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}