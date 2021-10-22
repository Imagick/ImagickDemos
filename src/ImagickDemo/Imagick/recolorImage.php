<?php

namespace ImagickDemo\Imagick;

class recolorImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::recolorImage";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        return "recolorImage was removed in ImageMagick 7. Use Imagick::colorMatrixImage instead. Probably";
    }
}
