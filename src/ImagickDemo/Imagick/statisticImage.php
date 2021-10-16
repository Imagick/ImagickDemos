<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\StatisticImageControl;

class statisticImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::statisticImage";
    }




    public static function getParamType(): string
    {
        return StatisticImageControl::class;
    }
}
