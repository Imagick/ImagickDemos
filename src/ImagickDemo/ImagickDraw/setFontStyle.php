<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class setFontStyle extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::setFontStyle";
    }

    public function getDescription()
    {
        return "Fonts depend on ghostscript <br/>";
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
