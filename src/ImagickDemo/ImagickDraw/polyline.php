<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Params\ThreeColors;

class polyline extends ImagickDrawExample
{
    public function getDescription()
    {
        return "";
    }

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
