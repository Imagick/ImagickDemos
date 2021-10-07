<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class pathCurveToQuadraticBezierAbsolute extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::pathCurveToQuadraticBezierAbsolute";
    }

    public function getDescription()
    {
        return "Please note - quadratic curves are not the same as cubic curves. They cannot be joined smoothly.";
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
