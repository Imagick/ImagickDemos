<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\TextUnderControls;

class setTextUnderColor extends ImagickDrawExample
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
        return TextUnderControls::class;
    }
}
