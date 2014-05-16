<?php

namespace ImagickDemo\Imagick;

class smushImages extends \ImagickDemo\Example {

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
        return "This appears not to work correctly.";
    }

    function renderImage() {
    /// {{{ proto boolean Imagick::smushimages(boolean stack, int offset)
        $imagick = new \Imagick(realpath($this->rsiControl->getImagePath()));
        $imagick2 = new \Imagick(realpath("../images/coolGif.gif"));

        $imagick->addimage($imagick2);
        
        
        $blah = $imagick->smushImages(true, 0);
        //var_dump($blah);
        $blah->setImageFormat('jpg');
        header("Content-Type: image/jpg");
        echo $blah->getImageBlob();
    }
}