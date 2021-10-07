<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\MatteControl;

class matte extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::matte";
    }

    public static function getParamType(): string
    {
        return MatteControl::class;
    }

    public function getDescription()
    {

//        $paintTypes = [\Imagick::PAINT_POINT, \Imagick::PAINT_REPLACE, \Imagick::PAINT_FLOODFILL, \Imagick::PAINT_FILLTOBORDER, \Imagick::PAINT_RESET];

        return '';
    }
}
