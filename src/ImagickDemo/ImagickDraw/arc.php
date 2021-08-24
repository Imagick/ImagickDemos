<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\ThreeColors;
use ImagickDemo\ImagickDraw\Controls\ArcControls;

class arc extends ImagickDrawExample
{
    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return ArcControls::class;
    }

    public function getDescription()
    {
        return "";
    }
}
