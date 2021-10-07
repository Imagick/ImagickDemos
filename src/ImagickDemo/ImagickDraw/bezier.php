<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class bezier extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::bezier";
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
