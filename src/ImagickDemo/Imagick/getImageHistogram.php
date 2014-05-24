<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Control\ImageControl;

class getImageHistogram extends  \ImagickDemo\Example {

    protected $imagePath;
    
    function __construct(ImageControl $imageControl) {
        $this->imageControl = $imageControl;
        $this->imagePath = $imageControl->getImagePath();
    }

    function getControl() {
        return $this->imageControl;
    }


    function render() {
        $imagick = new \Imagick(realpath($this->imagePath));
        $imagick->adaptiveResizeImage(200, 200, true);
        var_dump($imagick->getImageHistogram());
    }

    function renderImage() {

       

    }
}