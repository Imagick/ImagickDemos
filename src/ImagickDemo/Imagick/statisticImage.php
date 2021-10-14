<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\StatisticImageControl;

class statisticImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::statisticImage";
    }

    public function render()
    {
        return $this->renderImageURL();
    }


    public static function getParamType(): string
    {
        return StatisticImageControl::class;
    }
}
