<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class setFontStyle extends ImagickDrawExample
{
    public function getDescription()
    {
        return "Fonts depend on ghostscript <br/>";
    }



    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
