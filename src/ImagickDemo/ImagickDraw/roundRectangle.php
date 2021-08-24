<?php

namespace ImagickDemo\ImagickDraw;


use ImagickDemo\ImagickDraw\Controls\RoundRectangleControls;

class roundRectangle extends ImagickDrawExample
{
    public function getDescription()
    {
        return "";
    }


    public static function getParamType(): string
    {
        return RoundRectangleControls::class;
    }
}
