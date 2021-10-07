<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\TextDecorationControls;

class setTextDecoration extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::setTextDecoration";
    }

    public function getDescription()
    {
        return "";
    }

    public static function getParamType(): string
    {
        return TextDecorationControls::class;
    }
}
