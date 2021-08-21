<?php

namespace ImagickDemo\ImagickDraw;


use ImagickDemo\ImagickDraw\Controls\RoundRectangleControls;

class roundRectangle extends ImagickDrawExample
{
    public function getDescription()
    {
        return "";
    }
    public function hasReactControls(): bool
    {
        return true;
    }

    public static function getParamType(): string
    {
        return RoundRectangleControls::class;
    }
}
