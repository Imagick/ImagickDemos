<?php

namespace ImagickDemo\Imagick;

class selectiveBlurImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeRadiusSigmaImage
     */
    private $rsiControl;
    
    function __construct(\ImagickDemo\Control\ControlCompositeImageRadiusSigmaAmountUnsharpThresholdChannel $rsiControl) {
        $this->rsiControl = $rsiControl;
    }

    function getControl() {
        return $this->rsiControl;
    }
    
    function renderDescription() {
    }

    function renderImage() {
       
        $radius = $this->rsiControl->getRadius();
        $sigma = $this->rsiControl->getSigma();
        $threshold = $this->rsiControl->getUnsharpThreshold();
        $channel = $this->rsiControl->getChannelValue();

        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        //float radius, float sigma, float threshold[, int channel])
        $imagick->selectiveBlurImage($radius, $sigma, $threshold, $channel);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}