<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BlurImageControl;

class blurImage extends \ImagickDemo\Example
{
    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Blur image";
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


    public static function getParamType(): string
    {
        return BlurImageControl::class;
    }
}
