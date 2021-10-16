<?php

namespace ImagickDemo\ImagickKernel;

use \ImagickDemo\ImagickKernel\Controls\ImageControl;

class addKernel extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "ImagickKernel::addKernel";
    }

    public function renderDescription()
    {
        return "";
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
