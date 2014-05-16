<?php

namespace ImagickDemo\Imagick;

class quantizeImage extends \ImagickDemo\Example {
    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    private $rsiControl;
    
    function __construct(\ImagickDemo\Control\ImageControl $rsiControl) {
        $this->rsiControl = $rsiControl;
    }

    function getControl() {
        return $this->rsiControl;
    }

    function renderDescription() {
    }

    function renderImage() {
        //todo add control
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick->quantizeImage(20, \Imagick::COLORSPACE_YIQ, 8, true, false);
        //$imagick->quantizeImage(20, \Imagick::COLORSPACE_RGB, 8, true, false);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}