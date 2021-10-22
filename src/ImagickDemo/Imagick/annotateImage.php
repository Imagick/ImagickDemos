<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\AnnotateImageControl;

class annotateImage extends \ImagickDemo\Example
{
    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderTitle(): string
    {
        return "Annotate image";
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
        return AnnotateImageControl::class;
    }


}
