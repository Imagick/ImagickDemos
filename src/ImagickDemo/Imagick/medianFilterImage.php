<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\MedianFilterImageControl;

class medianFilterImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Median filter image";
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    Doesn't exist on ImageMagick 7 - write equivalant

median_image=StatisticImage(image,MedianStatistic,(size_t) radius,(size_t)
    radius,exception);

//    public static function getParamType(): string
//    {
//        return Nu::class;
//    }
}
