<?php

namespace ImagickDemo\Imagick;

class separateImageChannel extends \ImagickDemo\Example {

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
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        //TODO needs control
        $imagick->separateimagechannel(\Imagick::CHANNEL_BLUE);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}