<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class composite extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::";
    }

    public function getDescription()
    {
        return "TODO - completely replace this with a non-file based example.";
    }

    public static function getParamType(): string
    {
        return ThreeColors::class;
    }
}
