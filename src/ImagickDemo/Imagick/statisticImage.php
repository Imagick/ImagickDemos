<?php

namespace ImagickDemo\Imagick;

class statisticImage extends \ImagickDemo\Example {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageStatisticTypeW20H20
     */
    private $control;
    
    function __construct(\ImagickDemo\Control\ControlCompositeImageStatisticTypeW20H20 $control) {
        $this->control = $control;
    }

    /**
     * @return \ImagickDemo\Control
     */
    function getControl() {
        return $this->control;
    }

    function renderDescription() {
    }

    function renderImage() {
//    \Imagick::STATISTIC_GRADIENT
//    \Imagick::STATISTIC_MAXIMUM
//    \Imagick::STATISTIC_MEAN
//    \Imagick::STATISTIC_MEDIAN
//    \Imagick::STATISTIC_MINIMUM
//    \Imagick::STATISTIC_MODE
//    \Imagick::STATISTIC_NONPEAK
//    \Imagick::STATISTIC_STANDARD_DEVIATION

        //$imagick = new \Imagick(realpath($this->control->getImagePath()));
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        
        $statisticType = $this->control->getStatisticType();
        $width = $this->control->getW20();
        $height = $this->control->getH20();
        
        
        $imagick->statisticImage(
            $statisticType,
            $width, 
            $height
        );

        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}