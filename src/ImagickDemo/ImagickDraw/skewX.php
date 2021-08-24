<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\Skew;

class skewX extends ImagickDrawExample
{
    public function getDescription()
    {
        return "";
    }



    public static function getParamType(): string
    {
        return Skew::class;
    }
}
