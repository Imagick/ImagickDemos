<?php

namespace ImagickDemo\Imagick;

class setImageClipMask extends \ImagickDemo\Example
{
    public function renderTitle(): string
    {
        return "Imagick::setImageClipMask";
    }

    public function render(
        ?string $activeCategory,
        ?string $activeExample
    )
    {
        $html = <<< HTML

Imagick::setImageClipMask is not available when Imagick is compiled against ImageMagick 7. 

Use <a href="/Imagick/setImageMask">Imagick::setImageMask</a> instead.
HTML;
        return $html;
    }
}
