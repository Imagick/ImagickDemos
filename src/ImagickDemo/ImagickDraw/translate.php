<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\Translate as TranslateControl;

class translate extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::translate";
    }


    public function getDescription()
    {
        return "";
    }

    public static function getParamType(): string
    {
        return TranslateControl::class;
    }
}
