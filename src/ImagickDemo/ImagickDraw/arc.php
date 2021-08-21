<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Params\ThreeColors;
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
