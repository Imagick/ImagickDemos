<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\TextUnderControls;

class setTextUnderColor extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::setTextUnderColor";
    }

    public function getDescription()
    {
        return "";
    }

    public static function getParamType(): string
    {
        return TextUnderControls::class;
    }
}
