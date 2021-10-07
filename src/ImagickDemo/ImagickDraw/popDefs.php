<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class popDefs extends ImagickDrawExample
{
    public function renderTitle(): string
    {
        return "ImagickDraw::popDefs";
    }

    public function getDescription()
    {
        return "";
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
