<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Params\MatteControl;

class matte extends ImagickDrawExample
{
    public function hasReactControls(): bool
    {
        return true;
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
