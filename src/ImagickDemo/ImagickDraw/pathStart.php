<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Params\ThreeColors;

class pathStart extends ImagickDrawExample
{
    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }


    public function getDescription()
    {
        return "";
    }
}
