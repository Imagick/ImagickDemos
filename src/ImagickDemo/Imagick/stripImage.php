<?php

namespace ImagickDemo\Imagick;

class stripImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Strip image";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {


//Example Imagick::stripImage
        $output = '';
        $imagick = new \Imagick(realpath("../public/images/Biter_500.jpg"));
        $bytes = $imagick->getImageBlob();
        $output .= "Image byte size before stripping: " . strlen($bytes) . "<br/>";
        $imagick->stripImage();
        $bytes = $imagick->getImageBlob();
        $output .= "Image byte size after stripping: " . strlen($bytes) . "<br/>";
//Example end
    }
}
