<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\ThreeColors;

class pathStart extends ImagickDrawExample
{


    public static function getParamType(): string
    {
        return ThreeColors::class;
    }


    public function getDescription()
    {
        return "";
    }
}
