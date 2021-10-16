<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ThresholdImageControl;

class thresholdImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::thresholdImage";
    }

    public function renderDescription()
    {
        $output = "Convert an image into a black and white image with all pixels above the threshold converted to white, those below to black.";
        return $output;
    }

//    public function render(
//        ?string $activeCategory,
//        ?string $activeExample
//    )
//    {
//        $output = "Convert an image into a black and white image with all pixels above the threshold converted to white, those below to black.";
//        $output .= $this->renderImageURL();
//        return $output;
//    }

    public static function getParamType(): string
    {
        return ThresholdImageControl::class;
    }
}
