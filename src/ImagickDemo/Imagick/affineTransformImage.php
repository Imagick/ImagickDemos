<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class affineTransformImage extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        return "TODO - write the description...<br/>";
    }

    public function renderTitle(): string
    {
        return "Affine transform image";
    }

    public static function getParamType(): string
    {
        // TODO - this could do with more controls.
        return ImageControl::class;
    }

//    public function render(
//        ?string $activeCategory,
//        ?string $activeExample
//    )
//    {
//        return $this->renderImageURL();
//    }
}
