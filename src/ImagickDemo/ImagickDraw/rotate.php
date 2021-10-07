<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\FourColors;

class rotate extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::rotate";
    }

    public function getDescription()
    {
        return "";
    }

    public static function getParamType(): string
    {
        return FourColors::class;
    }
}
