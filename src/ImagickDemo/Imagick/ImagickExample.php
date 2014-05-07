<?php


namespace ImagickDemo\Imagick;


use ImagickDemo\Control\ImageControl;

class ImagickExample extends \ImagickDemo\Example {

    protected $imagePath;

    /**
     * @var \ImagickDemo\Control\ImageControl
     */
    private $imageControl;
    
    function __construct(ImageControl $imageControl) {
        $this->imageControl = $imageControl;
        $this->imagePath = $imageControl->getImagePath();
    }

    function getControl() {
        return $this->imageControl;
    }

    function renderControl() {
        return $this->imageControl->render();
    }

    function getURL() {
        return $this->imageControl->getURL();
    }

    function renderImageURL() {
        return $this->imageControl->getURL();
    }
}

 