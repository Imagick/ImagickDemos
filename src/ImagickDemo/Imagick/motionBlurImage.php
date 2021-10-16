<?php

namespace ImagickDemo\Imagick;

class motionBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::motionBlurImage";
    }

    public function getOriginalImage()
    {
        return true;
    }

//    function getOriginalImage()
//    {
//        return $this->control->getOriginalURL();
//    }
//
//    function getOriginalFilename()
//    {
//        return $this->control->getImagePath();
//    }


}
