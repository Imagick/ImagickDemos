<?php

namespace ImagickDemo\Imagick;

class rotationalBlurImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::rotationalBlurImage";
    }
    

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $output = "I have no idea how this is different from radialBlurImage. radialBlur is deprecated in ImageMagick";
        $output .= $this->renderImageURL();
        return $output;
    }
}
