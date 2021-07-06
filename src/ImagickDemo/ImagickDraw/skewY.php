<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Params\Skew;

class skewY extends ImagickDrawExample
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
        return Skew::class;
    }
}
