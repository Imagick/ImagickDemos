<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Params\FourColors;

class rotate extends ImagickDrawExample
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
        return FourColors::class;
    }
}
