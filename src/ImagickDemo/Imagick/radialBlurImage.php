<?php

namespace ImagickDemo\Imagick;

class radialBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::radialBlurImage";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $html = <<< HTML
Removed in ImageMagick 7. <a href="/Imagick/rotationalBlurImage">Imagick::RotationalBlurImage</a> gives a very similar result.
HTML;

        return $html;
    }

}
