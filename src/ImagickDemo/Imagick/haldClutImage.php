<?php

namespace ImagickDemo\Imagick;

class haldClutImage extends \ImagickDemo\Example {

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

        $imagickPalette = new \Imagick("../images/hald/hald_8.png");
        $imagickPalette->sepiatoneImage(55);
        $imagick->haldClutImage($imagickPalette);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}