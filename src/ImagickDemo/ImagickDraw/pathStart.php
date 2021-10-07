<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class pathStart extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::pathStart";
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
