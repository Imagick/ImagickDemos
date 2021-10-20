<?php

namespace ImagickDemo\Imagick;

class reduceNoiseImage extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::reduceNoiseImage";
    }


    public function render(
        ?string $activeCategory,
        ?string $activeExample
    ) {
        $html = <<< HTML
<p>This function is not available in ImageMagick 7.</p>

<p>
Imagick::WaveletDenoiseImage should be used instead....but I need to add that to the extension first.
</p>
HTML;

        return $html;
    }

}
