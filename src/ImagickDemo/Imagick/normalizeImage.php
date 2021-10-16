<?php

namespace ImagickDemo\Imagick;

class normalizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::normalizeImage";
    }

    public function renderDescription()
    {
        $output = "Original on left side, normalised on right. <br/>";
        return $output;
    }


//    public function render(
//        ?string $activeCategory,
//        ?string $activeExample
//    )
//    {
//
//        $output .= $this->renderImageURL();
//        return $output;
//    }
}
