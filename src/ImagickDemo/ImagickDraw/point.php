<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class point extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::point";
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
