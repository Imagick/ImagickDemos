<?php

namespace ImagickDemo\ImagickDraw;

use ImagickDemo\Example;
use ImagickDemo\ImagickDraw\Controls\MatteControl;

class matte extends Example
{
    public function renderTitle(): string
    {
        return "ImagickDraw::matte";
    }

    public static function getParamType(): string
    {
        return MatteControl::class;
    }

    public function isRemovedInIM7()
    {
        return true;
    }

    public function getDescription()
    {
        return '';
    }
}
