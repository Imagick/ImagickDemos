<?php

namespace ImagickDemo\Imagick;


class waveImage extends \ImagickDemo\Example {

    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeImageAmplitudeLength $control ) {
        $this->control = $control;
    }
    
    function getControl() {
        return $this->control;
    }
    
    function renderDescription() {
    }

    
    
    function renderImage() {
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        $amplitude = $this->control->getAmplitude();
        $length = $this->control->getLength();
        $imagick->waveImage($amplitude, $length);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}
