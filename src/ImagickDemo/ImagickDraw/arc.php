<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\ArcControls;


class arc extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::arc";
    }

    public static function getParamType(): string
    {
        return ArcControls::class;
    }
}
