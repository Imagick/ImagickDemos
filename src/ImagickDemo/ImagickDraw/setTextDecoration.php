<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\ImagickDraw\Controls\TextDecorationControls;

class setTextDecoration extends ImagickDrawExample
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
        return TextDecorationControls::class;
    }
}
