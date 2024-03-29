<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class autoLevelImage extends \ImagickDemo\Example
{
    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Auto-level image";
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

//    public function render(
//        ?string $activeCategory,
//        ?string $activeExample
//    )
//    {
//        return $this->renderImageURL();
//    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
