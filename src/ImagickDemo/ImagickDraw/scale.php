<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\FourColors;

class scale extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::scale";
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
