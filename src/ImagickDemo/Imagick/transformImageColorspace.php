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
        //http://www.imagemagick.org/Usage/color_basics/
    }

    function renderImage() {
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $colorSpace = $this->rsiControl->getColorSpaceType();
        $imagick->transformimagecolorspace($colorSpace);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}