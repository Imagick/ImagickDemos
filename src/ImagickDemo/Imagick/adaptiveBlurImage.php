<?php

namespace ImagickDemo\Imagick;

class adaptiveBlurImage extends \ImagickDemo\Example {

//    /**
//     * @var \ImagickDemo\Control\ControlCompositeRadiusSigmaImage
//     */
//    private $rsiControl;
//    
//    function __construct(\ImagickDemo\Control\ControlCompositeRadiusSigmaImage $rsiControl) {
//        $this->rsiControl = $rsiControl;
//    }

    function renderTitle() {
        return "Adaptive blur image";
    }

    function getControl() {
        return null;
    }
    
    function renderDescription() {
        return "This is a description. <br/>";
    }

    function renderImage() {
    }
    
    /*
     
    Yolo     
     
    
    function renderImage() {
        $radius = $this->rsiControl->getRadius();
        $sigma = $this->rsiControl->getSigma();
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick->adaptiveBlurImage($radius, $sigma);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    } */
}