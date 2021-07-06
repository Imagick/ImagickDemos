<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Params\ThreeColors;

class setFontStyle extends ImagickDrawExample
{
    public function getDescription()
    {
        return "Fonts depend on ghostscript <br/>";
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
