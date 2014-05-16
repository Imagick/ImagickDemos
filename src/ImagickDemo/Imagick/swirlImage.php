<?php


namespace ImagickDemo\Imagick;


class swirlImage extends \ImagickDemo\Example  {

    /**
     * @var \ImagickDemo\Control\ControlCompositeImageSwirl
     */
    private $control;

    
    function __construct(\ImagickDemo\Control\ControlCompositeImageSwirl $control) {
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
        $imagick = new \Imagick(realpath($this->control->getImagePath()));
        
        $swirl = $this->control->getSwirl();
        $imagick->swirlImage($swirl);
        header("Content-Type: image/jpg");
        echo $imagick->getImageBlob();
    }
}