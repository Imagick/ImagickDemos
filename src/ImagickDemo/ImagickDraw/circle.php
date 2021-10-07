<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\CircleControls;

class circle extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::circle";
    }

    public static function getParamType(): string
    {
        return CircleControls::class;
    }
}
