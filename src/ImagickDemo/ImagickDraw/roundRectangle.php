<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\RoundRectangleControls;

class roundRectangle extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::roundRectangle";
    }

    public function getDescription()
    {
        return "";
    }

    public static function getParamType(): string
    {
        return RoundRectangleControls::class;
    }
}
