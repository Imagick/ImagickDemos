<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\BlueShiftImageControl;

class blueShiftImage extends \ImagickDemo\Example
{
    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Blue shift image";
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
        return BlueShiftImageControl::class;
    }
}
