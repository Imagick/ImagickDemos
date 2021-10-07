<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\Skew;

class skewX extends Example
{

    public function renderTitle(): string
    {
        return "ImagickDraw::skewX";
    }

    public function getDescription()
    {
        return "";
    }

    public static function getParamType(): string
    {
        return Skew::class;
    }
}
