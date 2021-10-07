<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class setTextAntialias extends ImagickDrawExample
{
    public function renderTitle(): string
    {
        return "ImagickDraw::setTextAntialias";
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
