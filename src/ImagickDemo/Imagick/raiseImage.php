<?php

namespace ImagickDemo\Imagick;

class raiseImage extends \ImagickDemo\Example {

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
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        
        //x and y do nothing?
        $imagick->raiseImage(10, 10, 0, 0, true);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}