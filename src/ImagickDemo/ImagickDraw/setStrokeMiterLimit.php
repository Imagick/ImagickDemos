<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class setStrokeMiterLimit extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::setStrokeMiterLimit";
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
