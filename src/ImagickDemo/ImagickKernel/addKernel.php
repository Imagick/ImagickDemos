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
        return "Attach another kernel to this kernel to allow them to both be applied in a single morphology or filter function.";
    }

    public function render()
    {
        return $this->renderImageURL();
    }

    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
