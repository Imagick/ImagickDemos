<?php

namespace ImagickDemo\ImagickKernel;

class addKernel extends \ImagickDemo\Example
{
    public function renderDescription()
    {
        return "Attach another kernel to this kernel to allow them to both be applied in a single morphology or filter function.";

    }

    public function render()
    {
        return $this->renderImageURL();
    }
}
