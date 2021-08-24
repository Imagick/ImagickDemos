<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class pathCurveToQuadraticBezierSmoothAbsolute extends ImagickDrawExample
{
    public function getDescription()
    {
        return "Please note - quadratic curves are not the same as cubic curves. They cannot be joined smoothly.";
    }

    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
