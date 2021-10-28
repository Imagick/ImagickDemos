<?php

namespace ImagickDemo\Imagick;

use ImagickDemo\Example;
use ImagickDemo\Imagick\Controls\ContrastStretchImageControl;

class contrastStretchImage extends Example
{
    public function renderTitle(): string
    {
        return "Imagick::contrastStretchImage";
    }

    public function useImageControlAsOriginalImage()
    {
        return true;
    }

    public function renderDescription()
    {
        $html = <<< HTML
<p>MagickContrastStretchImage() enhances the contrast of a color image by adjusting the pixels color to span the entire range of colors available. You can also reduce the influence of a particular channel with a gamma value of 0.</p>
<p>¯\_(ツ)_/¯</p>
HTML;

        return $html;
    }

    public static function getParamType(): string
    {
        return ContrastStretchImageControl::class;
    }
}
