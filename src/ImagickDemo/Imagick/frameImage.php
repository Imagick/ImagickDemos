<?php

namespace ImagickDemo\Imagick;

class frameImage extends \ImagickDemo\Example {

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

        $matteColor = 'SaddleBrown'; 
        $width = 20;
        $height = 20;
        $innerBevel = 5;
        $outerBevel = 5;

        $imagick->frameimage(
            $matteColor,
            $width,
            $height,
            $innerBevel,
            $outerBevel
        );
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}