<?php

namespace ImagickDemo\ImagickPixelIterator;

use ImagickDemo\ImagickKernel\Controls\ImageControl;

class construct extends \ImagickDemo\Example
{

    public function renderTitle(): string
    {
        return "construct";
    }


    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = "<br/>";
        $output .= $this->renderImageURL();

        return $output;
    }



    public static function getParamType(): string
    {
        return ImageControl::class;
    }
}
