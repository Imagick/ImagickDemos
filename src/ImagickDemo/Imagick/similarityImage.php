<?php

namespace ImagickDemo\Imagick;

class similarityImage extends \ImagickDemo\Example {
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

        $imagick2 = clone $imagick;
        
        $imagick->similarityImage($imagick);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}