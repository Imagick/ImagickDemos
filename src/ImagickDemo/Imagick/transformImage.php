<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Imagick\Controls\ImageControl;

class transformImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::transformImage";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $words = <<< HTML
Removed in ImageMagick 7.

Use the Imagick::cropImage and Imagick::resize functions instead. 
HTML;

        return $words;
    }

}
