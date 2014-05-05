<?php


namespace ImagickDemo\Imagick;


use ImagickDemo\Control\ImageControl;

class ImagickExample extends \ImagickDemo\Example {

    protected $imagePath;

    function __construct(ImageControl $imageControl) {
        $this->imagePath = $imageControl->getImagePath();
    }
}

 