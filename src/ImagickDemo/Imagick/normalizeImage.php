<?php

namespace ImagickDemo\Imagick;

class normalizeImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::normalizeImage";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = "Original on left side, normalised on right. <br/>";
        $output .= $this->renderImageURL();
        return $output;
    }
}
